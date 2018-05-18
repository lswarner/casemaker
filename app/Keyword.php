<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable= ['keywords'];


    /**
     *  return an array of filters using style: kNN
     *    this is used to create the select boxes to filter
     *    the casestudies on the library view

     THIS IS NO LONGER BEING USED - Similar functions have been removed from Method, Thematic, and Audience

    public static function filters(){
      $filters= Keyword::all()->map( function ($a){
        return 'k'.$a->id;
      });

      return $filters;
    }
    */

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
