<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thematic extends Model
{
    protected $fillable=['name', 'description'];

    /**
     *  return an array of filters using style: tNN
     *    this is used to create the select boxes to filter
     *    the casestudies on the library view
     */
    public static function filters(){
      $filters= Thematic::all()->map( function ($a){
        return 't'.$a->id;
      });

      return $filters;
    }


    /**
     * Relationsships
     */

     public function casestudies(){
       return $this->belongsToMany('App\CaseStudy', 'case_study_thematics', 'thematics_id', 'case_study_id')->withTimestamps();
     }


     /**
      * Accessors
      */
     public static function all_sorted(){
        $thematics = Thematic::all()->sortBy('name');
        $thematics->values()->all();
        return $thematics;
     }
}
