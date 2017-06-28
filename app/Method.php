<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    protected $fillable= ['name', 'description'];


    /*******************************************************
         Relationships
     ******************************************************/

    /**
     * get the case studies that use this keyword
     */
     public function casestudies(){
       return $this->belongsToMany('App\CaseStudy')->withTimestamps();
     }


     /*******************************************************
          Accessors
      ******************************************************/

    /**
  	 * Return a list of all methods sorted alphabetically
  	 *
  	 */
    public static function all_sorted() {
        $methods= Method::all()->sortBy('name');
        $methods->values()->all();
   		  return $methods;
    }
}
