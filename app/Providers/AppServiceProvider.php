<?php

namespace App\Providers;

use App\Handlers\Events\SlackSubscriber;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $locale = 'en';

        if ($this->app->environment() !== 'testing') {
            Event::subscribe(SlackSubscriber::class);

            $locale = locale();
        }

        $this->app->setlocale($locale);


        View::composer('*', function ($view) use ($locale) {
            $view->with('locale', $locale);
        });
    }
}
