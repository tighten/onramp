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
        if ($this->app->environment() !== 'testing') {
            Event::subscribe(SlackSubscriber::class);
        }

        // @todo middleware maybe eh?
        $locale = request()->segments()[0];
        $locales = ['en', 'es'];

        if (! in_array($locale, $locales)) {
            throw new \Exception('Invalid locale '. $locale);
        }

        App::setlocale($locale);

        View::composer('*', function ($view) use ($locale) {
            $view->with('locale', $locale);
        });
    }
}
