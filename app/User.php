<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'affiliation', 'introduction'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




    /**
  	 * Scope a query to only users that are approved
  	 *
  	 *
  	 * @return \Illuminate\Database\Eloquent\Builder
  	 */
  	public function scopeApproved($query)
  	{

  		return $query->where('is_approved', '=', true);
  	}

    /**
  	 * Scope a query to only users that are pending approval
  	 *
  	 *
  	 * @return \Illuminate\Database\Eloquent\Builder
  	 */
  	public function scopePending($query)
  	{

  		return $query->where('is_approved', '=', false);
  	}
}
