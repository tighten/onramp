<?php

namespace App\Providers;

use App\Handlers\Events\SlackSubscriber;
use App\Localization\Locale;
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
        $currentLocale = 'en';

        if ($this->app->environment() !== 'testing') {
            Event::subscribe(SlackSubscriber::class);
            if ( ! $this->app->runningInConsole()) {
                $currentLocale = locale();
            }
        }

        $this->app->setlocale($currentLocale);

        View::composer('*', function ($view) use ($currentLocale) {

            $locale = new Locale();
            $view->with('currentLanguage', $locale->getLanguageForLocale($currentLocale))
                ->with('supportedLocales', $locale->all())
                ->with('locales', $locale);
        });
    }
}
