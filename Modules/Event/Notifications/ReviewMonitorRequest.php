<?php

namespace Modules\Event\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReviewMonitorRequest extends Notification
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
        // $this->queue = "default";
        // $this->connection = 'database';
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
            'message' => ' (  ' . $this->mentoring->title . ' )راجع بريدك الالكتروني بخصوص ',
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
        $data['yes_url'] = route('frontend.verify_mentoring', ['reference' => encrypt($this->mentoring->reference)]) . '?res=yes&u_id=' . $this->mentoring->user->id;

        $data['no_url'] = route('frontend.verify_mentoring', ['reference' => encrypt($this->mentoring->reference)]) . '?no=yes&u_id=' . $this->mentoring->user->id;

        // Mail::to($email)
        return (new MailMessage)
            ->subject(___('email.Review mentoring ') . $this->mentoring->title)
            ->view('common.email.email-review-mentoring', compact('data'));
        // ->line('The introduction to the mentoring.')
        // ->action('Notification Action', url('/'))
        // ->line('Thank you for using our application!');
    }
}
