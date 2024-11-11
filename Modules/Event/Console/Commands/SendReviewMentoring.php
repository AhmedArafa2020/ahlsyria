<?php

namespace Modules\Event\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use Modules\Event\Entities\Mentoring;
use Modules\Event\Notifications\ReviewMonitorRequest;

class SendReviewMentoring extends Command
{
    protected $signature = 'events:send-review-mentoring';
    protected $description = 'Send review for mentoring after 2 weeks';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $afterTwoWeeks = Carbon::now()->addDays(14)->startOfDay();

        // test -> $mentorings = Mentoring::whereDate('mentoring_date', '<', $afterTwoWeeks->toDateString())
        $mentorings = Mentoring::whereDate('mentoring_date', '>', $afterTwoWeeks->toDateString())
            ->idle()
            ->notBroadcasted()
            ->with('user', 'mentor')
            ->select('id', 'title', 'user_id', 'mentor_id', 'reference', 'mentoring_date')
            ->get();

        foreach ($mentorings as $mentoring) {
            $user = $mentoring->user; // student to review the mentor
            Notification::sendNow($user, new ReviewMonitorRequest($mentoring));
            $mentoring->broadcasted();
        }

        $this->info($mentorings->count() . ' Review request sent!');
    }
}
