<?php

namespace App\Providers;

use App\Localization\Locale;
use Illuminate\Support\ServiceProvider;

class LocalizationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('localization', function ($app) {
            return new Locale;
        });
    }
}
