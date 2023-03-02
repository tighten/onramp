<?php

namespace App\Providers;

use App\Handlers\Events\SlackSubscriber;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        if (class_exists(\Laravel\Nova\NovaApplicationServiceProvider::class)) {
            $this->app->register(\App\Providers\NovaServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Relation::morphMap([
            'App\Module' => \App\Models\Module::class,
            'App\Resource' => \App\Models\Resource::class,
            'App\Skill' => \App\Models\Skill::class,
        ]);

        if ($this->app->environment() !== 'testing') {
            Event::subscribe(SlackSubscriber::class);
        }

        $this->app->setLocale(locale());
    }
}
