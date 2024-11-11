<?php

namespace Modules\Event\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMentoringRequest extends Notification
{

    use Queueable;
    public $mentoring;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mentoring)
    {
        $this->mentoring = $mentoring;
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
        return ['database', 'mail'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => ' )راجع بريدك الالكتروني بخصوص ' . ' (  ' . $this->mentoring->title,
        ];
    }

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
            'mentoring' => $this->mentoring,
        ];

        // Mail::to($email)
        return (new MailMessage)
            ->subject(___('email.New mentoring ') . '-' . $this->mentoring->title)
            ->view('common.email.email-new-mentoring', compact('data'));
        // ->line('The introduction to the mentoring.')
        // ->action('Notification Action', url('/'))
        // ->line('Thank you for using our application!');
    }
}
