<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\CaseStudy;

class CMS extends Model
{
    protected $table= "cms";
    protected $guarded= [];
    private $excluded= ['casemaker_logo', 'library_logo', 'splash_image', 'favicon', 'casemaker_title', 'library_title', 'library_splash', 'welcome_text', 'id', 'created_at', 'updated_at', 'active_countries']; // attributes which shouldn't be included in SCSS file


    public function getStylesheetUrlAttribute(){
      return resource_path("assets/sass/_custom_variables.scss");
    }

    /**
    * write the style variables to the custom scss file.
    */
    public function generateStylesheet(){

      $file= fopen($this->stylesheet_url, 'w');

      $stylesheet_attributes= collect($this->getAttributes())->except($this->excluded);

      $success=true;
      $stylesheet_attributes->each(function($item, $key) use ($file){
        if( fwrite($file, "\$".$key.": ".$item.";\n") ===false){
          throw new Exception("Error writing 'assets/sass/_custom_variables.scss' stylesheet", 1);
        }
        //echo '$'.$key.': '.$item.'\n';
      });

      fclose($file);

      return true;
    }



    public function generateActiveCountries(){
      //generate list of countries used by Live casestudies
      $published= CaseStudy::published()->get();

      $a= collect([]);
      foreach($published as $cs){
        $a= $a->merge($cs->collectCountries());
      }
      $a= $a->unique()->sort();
      $this->active_countries= implode(', ', $a->toArray());  //store the countries as a comma-seperated string
      $this->save();

      return true;
    }

    //
    public function getActiveCountriesAttribute($value){

      if( empty($value) ){
        $this->generateActiveCountries();
      }
      //countries are stored as comma-seperated string- so explode them to an array, then return colleciton
      return collect( explode(', ', $this->attributes['active_countries']) );
    }



    /**
  	 * Set the logo atribute - and delete the old logo (if neccessary) from the filesystem
  	 *
  	 * @param string $value - URI of the new logo
  	 */
  	public function setCasemakerLogoAttribute($value){

  		  //$this->deleteImage($this->attributes['casemaker_logo']);

  		  $this->attributes['casemaker_logo']= $value;
  	}

    /**
  	 * Retrieve the URL to the casemaker logo.
     *   - wrap the string as a URL before returning.
  	 *
  	 * @param string $value - URI of the logo
  	 */
  	public function getCasemakerLogoAttribute($value){
  		return $this->wrapURL($value);
  	}





    /**
  	 * Set the logo atribute - and delete the old logo (if neccessary) from the filesystem
  	 *
  	 * @param string $value - URI of the new logo
  	 */
  	public function setFaviconAttribute($value){

  		  $this->attributes['favicon']= $value;
  	}

    /**
  	 * Retrieve the URL to the casemaker logo.
     *   - wrap the string as a URL before returning.
  	 *
  	 * @param string $value - URI of the logo
  	 */
  	public function getFaviconAttribute($value){
  		return $this->wrapURL($value);
  	}





    /**
  	 * Set the logo atribute - and delete the old logo (if neccessary) from the filesystem
  	 *
  	 * @param string $value - URI of the new logo
  	 */
  	public function setLibraryLogoAttribute($value){

  		  //$this->deleteImage($this->attributes['library_logo']);

  		  $this->attributes['library_logo']= $value;
  	}


    /**
  	 * Retrieve the URL to the library logo.
  	 *
  	 * @param string $value - URI of the logo
  	 */
  	public function getLibraryLogoAttribute($value){
  		return $this->wrapURL($value);
  	}


    /**
     * Wrap a string as a URL before returning
     */
    private function wrapURL($value){
      if( $value ){
  			return url($value);
  		}

  		return "";
    }


    /**
     * Delete the old image before saving the URL to the new image
     */
    public function deleteImage($image){
      if( !empty( $image ) ){
  			\File::delete( public_path( $image ) );
  		}
      return true;
    }


}
