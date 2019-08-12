<?php

namespace App;

use Exception;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ResolveLocale
{
    protected $request;
    protected $application;

    protected $locales = [
        'en',
        'es',
    ];

    public function __construct(Request $request, Application $app)
    {
        $this->request = $request;
        $this->app = $app;
    }

    public function __invoke()
    {
        // Default to 'en' for Artisan, etc.
        if ($this->app->runningInConsole() && ! $this->app->runningUnitTests()) {
            return 'en';
        }

        $segments = $this->request->segments();
        $locale = reset($segments);

        if ($locale && ! $this->validLocale($locale)) {
            throw new Exception('Invalid locale '. $locale);
        }

        // Default to 'en', primarily for a non-exception response on the '/' route
        return $locale ?? 'en';
    }

    public function validLocale($locale)
    {
        return in_array($locale, $this->locales);
    }

    public function locales()
    {
        return $this->locales;
    }
}
