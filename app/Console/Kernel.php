<?php

namespace App\Console;

use App\Jobs\WebhookExecutionJob;
use App\Jobs\CheckFailedPaymentsJob;
use App\Jobs\CheckExpiredSubscriptionsJob;
use App\Jobs\DeleteOldNotificationsJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(new WebhookExecutionJob())->everyMinute();
        $schedule->job(new CheckFailedPaymentsJob())->everyMinute();
        $schedule->job(new CheckExpiredSubscriptionsJob())->daily();
        $schedule->job(new DeleteOldNotificationsJob())->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
