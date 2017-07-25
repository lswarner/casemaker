<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use SoftDeletes;
    use Notifiable;

    protected $dates = ['deleted_at'];



    public function casestudy(){
      return $this->belongsTo('App\CaseStudy', 'case_study_id');
    }

    public function invitedBy(){
      return $this->belongsTo('App\User','user_id');
    }
}
