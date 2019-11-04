<?php

namespace App\Providers;

use App\Preferences\Preferences;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\ServiceProvider;

class PreferencesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('preferences', function ($app) {
            return new Preferences($app->make(AuthManager::class)->user());
        });
    }
}
