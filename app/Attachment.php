<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    //

    public function casestudy(){
      return $this->belongsTo('App\CaseStudy', 'case_study_id');
    }
}
