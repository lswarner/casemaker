<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegistrationPending extends Notification
{
    use Queueable;

    public $registered_user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(\App\User $registered_user)
    {
        $this->registered_user= $registered_user;
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New CaseMaker Account Request')
                    ->markdown('emails.user.account-request',
                        ['user'=>$notifiable,
                        'registered_user'=>$this->registered_user,
                        'url'=> route('user.edit', $this->registered_user)
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
