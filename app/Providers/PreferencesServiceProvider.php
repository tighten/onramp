<?php

namespace App\Providers;

use App\Preferences\Preferences;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\ServiceProvider;

class PreferencesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('preferences', function ($app) {
            return new Preferences($app->make(AuthManager::class)->user());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
