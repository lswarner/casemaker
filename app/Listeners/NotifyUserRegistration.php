<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notifications\Registration;
use App\Notifications\RegistrationPending;
use App\Notifications\AccountApproved;
use App\Invitation;

class NotifyUserRegistration
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        //
        $user = $event->user;

        /* two ways to proceed:
         *  1)  the user has been invited to join a casestudy,
         *      so we need to add them to the casestudy, approve
         *      their account, and send a welcome email
         *  2)  the user is new and need to be approved first,
         *      so we send the admin a notificatio and leave the
         *      user in pending status.
         */

        $invitations= Invitation::withEmail($user->email)->get();

        if($invitations->count() > 0){ //option 1

          foreach($invitations as $i){
            $i->casestudy->team()->attach($user); //assign this user to the CaseStudy

            $i->delete();   //soft delete the invitation
          }

          $user->is_approved= true; //approve the user programatically
          $user->save();

          $user->notify(new AccountApproved);

        }
        else {  //option 2

          $user->notify(new Registration);

          $admins= \App\User::admins()->get();
          foreach($admins as $a){
            $a->notify(new RegistrationPending($user));
          }

        }
    }
}
