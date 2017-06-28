<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Notifications\Registration;
use App\Notifications\RegistrationPending;

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
        $user->notify(new Registration);

        $admins= \App\User::admins()->get();
        foreach($admins as $a){
          $a->notify(new RegistrationPending($user));
        }
    }
}
