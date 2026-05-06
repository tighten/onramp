<?php

use App\Console\Commands\GetExpiredResources;
use App\Console\Commands\SendResourceDigestEmail;
use Illuminate\Console\Scheduling\Schedule as ScheduleContract;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command(GetExpiredResources::class, ['-N'])
    ->weeklyOn(ScheduleContract::FRIDAY, '06:00');

Schedule::command(SendResourceDigestEmail::class)->monthly();
