<?php

namespace App\Providers;

use App\Facades\Localization;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('layouts.app', function ($view) {
            $path = implode('/', array_slice(request()->segments(), 1, null, true));
            $path = empty($path) ? $path : '/' . $path;
            $view->with([
                'language' => Localization::languageForLocale(locale()),
                'path' => $path,
                'localesForSwitcher' => collect(Localization::all())->map(function($language, $locale){
                    return [['locale' => $locale, 'language' => $language]];
                })->flatten(1)
            ]);
        });
    }
}
