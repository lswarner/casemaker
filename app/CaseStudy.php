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
                'title', 'countries',
                'intro_context', 'intro_nuances', 'intro_tips', 'intro_acronyms', 'intro_objectives', 'intro_questions'
                ];


/*******************************************************
     Relationships
 ******************************************************/

/**
 * get the methods this case study uses
 */
 public function methods(){
   return $this->belongsToMany('App\Method', 'case_study_method', 'case_study_id', 'method_id')->withTimestamps();
 }

 /**
  * get the keywords this case study uses
  */
  public function keywords(){
    return $this->belongsToMany('App\Keyword', 'case_study_keyword', 'case_study_id', 'keyword_id')->withTimestamps();
  }


}
