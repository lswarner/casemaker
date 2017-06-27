<?php

namespace App\Listeners;

use App\Events\AccountApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class UserStatusChanged
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
     * @param  AccountApproved  $event
     * @return void
     */
    public function handle(AccountApproved $event)
    {
        $user= $event->user;

        $user->notify(new \App\Notifications\AccountApproved);
    }
}
