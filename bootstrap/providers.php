<?php

declare(strict_types=1);
use App\Providers\AppServiceProvider;
use App\Providers\LocalizationServiceProvider;
use App\Providers\NovaServiceProvider;
use App\Providers\PreferencesServiceProvider;
use App\Providers\ViewServiceProvider;

return [
    AppServiceProvider::class,
    NovaServiceProvider::class,
    PreferencesServiceProvider::class,
    LocalizationServiceProvider::class,
    ViewServiceProvider::class,
];
