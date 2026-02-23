<?php

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Facade;

return [

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Laravel Framework Service Providers...
         */

        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\NovaServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        App\Providers\PreferencesServiceProvider::class,
        App\Providers\LocalizationServiceProvider::class,
        App\Providers\ViewServiceProvider::class,
        KgBot\LaravelLocalization\LaravelLocalizationServiceProvider::class,
    ])->toArray(),

    'aliases' => Facade::defaultAliases()->merge([
        'ExportLocalization' => 'KgBot\\LaravelLocalization\\Facades\\ExportLocalization',
        'Localization' => App\Facades\Localization::class,
        'Preferences' => App\Facades\Preferences::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
    ])->toArray(),

];
