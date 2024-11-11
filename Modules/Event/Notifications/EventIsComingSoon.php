<?php

namespace Modules\Event\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventIsComingSoon extends Notification
{

    use Queueable;
    public $event;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
        // return ['database', 'mail'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'قريباً سوف ينطق(  ' . $this->event->title . ' )كن مستعد',
            'start_date' => $this->event->start_date
        ];
    }

    // public function toDatabase($notifiable)
    // {
    //     return [
    //         'message' => 'The introduction to the notification for database.',
    //         // Add any additional data you want to store in the database
    //     ];
    // }

    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }
}
