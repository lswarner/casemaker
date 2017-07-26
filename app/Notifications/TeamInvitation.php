<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TeamInvitation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($invitation)
    {
        $invitedBy= $invitation->invitedBy;
        $casestudy= $invitation->casestudy;

        $title= "";
        if( $casestudy->title != ""){
          $title= ' titled <b>"'.$casestudy->title.'"</b>';
        }

        return (new MailMessage)
                  ->subject($invitation->invitedBy->name.' invited you to join '.config('app.name').'')
                  ->markdown('emails.user.invited', [
                      'invitedBy'=> $invitedBy,
                      'title' => $title,
                      'url'=> route('home')
                  ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
