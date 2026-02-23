<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::command('resource:expired -N')
    ->weeklyOn(Schedule::FRIDAY, '06:00');

Schedule::command('mail:send-resource-digest-email')->monthly();
