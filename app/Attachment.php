<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Attachment extends Model
{
    //

    public function url(){
      return '/casestudy/'.$this->casestudy->id.'/attachment/'.$this->id;
    }

    public function attachments($section= ""){
      return App\Attachment::section($section)->get();
    }

    public function casestudy(){
      return $this->belongsTo('App\CaseStudy', 'case_study_id');
    }

    public function scopeSection($query, $section){
        return $query->where('section', '=', $section);
    }
}
