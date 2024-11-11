<?php

namespace Modules\Event\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewsletterEmail extends Notification implements ShouldQueue
{

    use Queueable;
    public $newsletter;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newsletter)
    {
        $this->queue = "default";
        $this->connection = 'database';
        $this->newsletter = $newsletter;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['database'];
        return ['mail'];
    }

    // public function toArray($notifiable)
    // {
    //     return [
    //         'message' => ' (  ' . $this->mentoring->title . ' )راجع بريدك الالكتروني بخصوص ',
    //     ];
    // }

    // public function toDatabase($notifiable)
    // {
    //     return [
    //         'message' => 'The introduction to the notification for database.',
    //         // Add any additional data you want to store in the database
    //     ];
    // }

    public function toMail($notifiable)
    {

        $data = [
            'newsletter' => $this->newsletter,
        ];

        // Mail::to($email)
        return (new MailMessage)
            ->subject($this->newsletter->title)
            ->view('common.email.email-newsletter', compact('data'));
    }
}
