<?php

namespace App\Listeners;

use App\Events\AccountDenied;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAcountDenied
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
     * @param  AccountDenied  $event
     * @return void
     */
    public function handle(AccountDenied $event)
    {
      $user= $event->user;

      $user->notify(new \App\Notifications\AccountDenied);
    }
}
