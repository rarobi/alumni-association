<?php

namespace App\Console;

use App\Console\Commands\RenewalAlertEmail;
use App\Console\Commands\SendAlumniRegistrationEmail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

/**
 * Class Kernel.
 */
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SendAlumniRegistrationEmail::class,
        RenewalAlertEmail::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        //Send email every 5 minutes
        $schedule->command('cste:send-alumni-registration-email')
            ->everyFiveMinutes()
            ->withoutOverlapping(5);

        //Send email for renewal alert
        $schedule->command('cste:alumni-registration-renewal-alert')
            ->dailyAt('12:00')
            ->withoutOverlapping(5);

    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
