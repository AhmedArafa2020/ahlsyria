<?php

namespace App\Console;

use Aws\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $command = [
        Commands\DatabaseMigrate::class,
    ];
    /**
     * Use crontab to run  the scheduler
     * php artisan schedule:run
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('events:send-reminders')->twiceDaily(5, 18);

        //php artisan queue:work --tries=2 --timeout=30
        $schedule->command('queue:work --timeout=60 --tries=2 --stop-when-empty')
            ->everyTenMinutes()
            ->withoutOverlapping();

        // for Supervisor
        // $schedule->command('queue:restart')->hourly();

        if (env('APP_DEMO')) {
            $schedule->command('command:db-seed')->everyMinute();
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
