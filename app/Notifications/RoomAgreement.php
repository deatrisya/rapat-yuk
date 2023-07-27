<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RoomAgreement extends Notification
{
    use Queueable;

    private $messages;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct()
    {
        //
        $this->messages = [
            'header' => '',
            'body' => ''
        ];
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
                    ->line($this->messages['header'])
                    ->line($this->messages['body'])
                    //->action('Notification Action', url('/'))
                    ->line('Salam hangat tim pengembang rapat yukkk');
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
