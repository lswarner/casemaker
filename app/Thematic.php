<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thematic extends Model
{
    protected $fillable=['name', 'description'];

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
