<?php

namespace App\Providers;

use App\Facades\Localization;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('partials.language-switcher', function ($view) {
            $view->with([
                'localeSlugs' => Localization::slugs(),
                'language' => Localization::languageForLocale(locale()),
            ]);
        });
    }
}
