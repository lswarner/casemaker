<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
    protected $fillable=  [
                'title', 'countries', 'keywords',
                'intro_context', 'intro_nuances', 'intro_tips', 'intro_acronyms', 'intro_objectives', 'intro_questions'
                ];


/*******************************************************
     Relationships
 ******************************************************/

/**
 * get the methods this case study uses
 */
 public function methods(){
   return $this->belongsToMany('App\Methods')->withTimestamps();
 }

 /**
  * get the keywords this case study uses
  */
  public function keywords(){
    return $this->belongsToMany('App\Keywords')->withTimestamps();
  }


}
