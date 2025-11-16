<?php

namespace App\Console;

use Carbon\Carbon;
use App\Console\Commands\SendResourceDigestEmail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        SendResourceDigestEmail::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('resource:expired -N')
            ->weeklyOn(Schedule::FRIDAY, '06:00');
        
        $schedule->call(fn () => event('laracasts-monthly-reminder'))
            ->weeklyOn(Schedule::FRIDAY, '06:15')
            ->when(function () {
                $now = Carbon::now();
                $endOfMonth = $now->copy()->endOfMonth();
                $lastFriday = $endOfMonth->isFriday()
                    ? $endOfMonth
                    : $endOfMonth->previous(Carbon::FRIDAY);
                
                return $now->isSameDay($lastFriday);
            });
        
        $schedule->command('mail:send-resource-digest-email')->monthly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
