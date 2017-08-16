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
                'intro_context', 'intro_nuances', 'intro_tips', 'intro_acronyms', 'intro_objectives', 'intro_questions',
                'method_used', 'method_challenges', 'method_tips', 'method_partners', 'method_questions', 'method_files',
                'results_discuss', 'results_challenges', 'results_tips', 'results_questions', 'results_files',
                'implications_discuss', 'implications_challenges', 'implications_tips', 'implications_questions', 'implications_files',
              ];

/*******************************************************
     Set Dates for Carbon Mutators
 ******************************************************/
public function getDates(){
  return array('created_at', 'updated_at', 'submitted_at', 'published_at');
}


public function setStatusAttribute($new_status){

  switch($new_status){
    case "created":
    case "submitted":
    case "published":
      $this->attributes['status']= strtolower($new_status);
      break;

    default:
      return false;
  }

}


/*******************************************************
     Relationships
 ******************************************************/

public function team(){
  return $this->belongsToMany('App\User', 'case_study_user', 'case_study_id', 'user_id')->withTimestamps();
}

public function invitations(){
  return $this->hasMany('App\Invitation');
}

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

  public function attachments(){
    return $this->hasMany('App\Attachment');
  }



  /*****************************************************
       scopes
   ****************************************************/

   /**
   * Scope a query to only created case studies
   *
   *
   * @return \Illuminate\Database\Eloquent\Builder
   */
  public function scopeIn_Progress($query)
  {
    return $query->where('status', '=', 'created');
  }



  /**
  * Scope a query to only created case studies
  *
  *
  * @return \Illuminate\Database\Eloquent\Builder
  */
 public function scopeSubmitted($query)
 {
   return $query->where('status', '=', 'submitted');
 }



 /**
 * Scope a query to only created case studies
 *
 *
 * @return \Illuminate\Database\Eloquent\Builder
 */
public function scopePublished($query)
{
  return $query->where('status', '=', 'published');
}


}
