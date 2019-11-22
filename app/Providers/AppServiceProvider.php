<?php

namespace App\Providers;

use App\Handlers\Events\SlackSubscriber;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use KgBot\LaravelLocalization\Facades\ExportLocalizations;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment() !== 'testing') {
            Event::subscribe(SlackSubscriber::class);
        }

        $this->app->setLocale($this->app->runningInConsole() ? 'en' : locale());

        View::composer('layouts.app', function ($view) {
            return $view->with([
                'jsonTranslations' => ExportLocalizations::export()->toFlat(),
            ]);
        });
    }
}
