<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CMS extends Model
{
    protected $table= "cms";
    protected $guarded= [];
    private $excluded= ['logo', 'background', 'id', 'created_at', 'updated_at']; // attributes which shouldn't be included in SCSS file


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
          throw new Exception("Error writing 'assets/sass/_custom_variables.scss' stylesheer", 1);
        }
        //echo '$'.$key.': '.$item.'\n';
      });

      fclose($file);

      return true;
    }


}
