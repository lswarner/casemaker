<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    protected $fillable=['name', 'description'];

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
