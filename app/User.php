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
        'name', 'email', 'password', 'affiliation', 'introduction', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /*******************************************************
         Accessors
     ******************************************************/

    /**
     * lastName
     * @return the last name of the user -
     *         or at least, the last string separated by
     *         empty space
     */
    public function lastName(){
      $last= explode(" ", $this->name);
      return end($last);
    }

    /**
     * lastInitial
     * @return the CAPITALIZED first initial of the last name of the user -
     *         or at least, the last string separated by
     *         empty space
     */
    public function lastInitial(){
      return strtoupper(substr( $this->lastName(), 0, 1));
    }

    /**
    * Return a list of all users sorted alphabetically
    *
    */
    public static function all_sorted() {
       $users= User::all()->sortBy(function($user) {
         return strtoupper($user->lastName());
       });
       $users->values()->all();
       return $users;
     }

    /*******************************************************
         Relationships
     ******************************************************/

     public function casestudies(){
       return $this->belongsToMany('App\CaseStudy', 'case_study_user', 'user_id', 'case_study_id')->withTimestamps();
     }


     public function invitations(){
       return $this->hasMany('App\Invitation');
     }



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


    /**
     * Scope a query to only users that are pending approval
     *
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAdmins($query)
    {

      return $query->where('is_admin', '=', true);
    }

}
