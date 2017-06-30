<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable= ['keywords'];


    /*******************************************************
         Relationships
     ******************************************************/

    /**
     * get the case studies that use this method
     */
     public function casestudies(){
       return $this->belongsToMany('App\CaseStudy', 'case_study_keyword', 'keyword_id', 'case_study_id')->withTimestamps();
     }


     /*******************************************************
          Accessors
      ******************************************************/

     /**
   	 * Return a list of all keywords sorted alphabetically
   	 *
   	 */
     public static function all_sorted() {
        $keywords= keyword::all()->sortBy('keyword');
        $keywords->values()->all();
    		return $keywords;
      }
}
