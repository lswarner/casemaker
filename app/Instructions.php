<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructions extends Model
{
    protected $guarded= ['files', 'updated_at', 'created_at'];
    /*
    protected $fillable= [
        'intro0', 'intro1', 'introh1', 'intro2', 'introh2',
        'method0', 'method1', 'methodh1', 'method2', 'methodh2',
        'results0', 'results1', 'resultsh1',
        'implications0', 'implications1', 'implicationsh1', 'implications2', 'implicationsh2',
      ];
      */


}
