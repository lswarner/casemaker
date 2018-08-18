<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable=['name', 'blade', 'description'];



    /**
     * Relationships
     */

     public function casestudies(){
       return $this->hasMany('App\CaseStudy');
     }


     /**
      * Accessors
      */
     public static function all_sorted(){
        $templates = Template::all()->sortBy('name');
        $templates->values()->all();
        return $templates;
     }
}
