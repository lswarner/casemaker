<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    protected $fillable=['name', 'description'];


    /**
     *  return an array of filters using style: mNN
     *    this is used to create the select boxes to filter
     *    the casestudies on the library view
     */
    public static function filters(){
      $filters= Audience::all()->map( function ($a){
        return 'a'.$a->id;
      });

      return $filters;
    }


    /**
     * Relationsships
     */

     public function casestudies(){
       return $this->belongsToMany('App\CaseStudy', 'case_study_audience', 'audience_id', 'case_study_id')->withTimestamps();
     }


     /**
      * Accessors
      */
     public static function all_sorted(){
       $audiences= Audience::all()->sortBy('name');
       $audiences->values()->all();
       return $audiences;
     }
}
