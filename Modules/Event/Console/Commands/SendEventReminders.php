<?php

namespace Modules\Event\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use Modules\Event\Entities\Event;
use Modules\Event\Notifications\EventIsComingSoon;

class SendEventReminders extends Command
{
    protected $signature = 'events:send-reminders';
    protected $description = 'Send reminders for events starting in 2 days';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $twoDaysFromNow = Carbon::now()->addDays(2)->startOfDay();
        $events = Event::whereDate('start_date', $twoDaysFromNow->toDateString())
            ->active()
            ->notBroadcasted()
            ->select('id', 'title', 'start_date')
            ->get();

        foreach ($events as $event) {
            $users = $event->users;
            Notification::sendNow($users, new EventIsComingSoon($event));
            $event->broadcasted();
        }

        $this->info($events->count() . ' Reminders sent!');
    }
}
