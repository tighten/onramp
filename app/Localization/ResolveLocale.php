<?php

namespace App\Localization;

use App\Exceptions\InvalidLocale;
use App\Facades\Localization;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ResolveLocale
{
    protected $request;
    protected $app;

    public function __construct(Request $request, Application $app)
    {
        $this->request = $request;
        $this->app = $app;
    }

    public function __invoke()
    {
        $segments = $this->request->segments();

        if (count($segments) === 0) {
            if (app()->runningInConsole()) {
                // Default to 'en' when running in console and not mocking requests in tests
                return 'en';
            }

            return 'not-defined-because-at-site-root';
        }

        $locale = reset($segments);

        if (! Localization::isValid($locale)) {
            // Allow Nova passthrough
            if ($locale === 'nova' || $locale === 'nova-api' || $locale === 'nova-vendor') {
                return 'nova';
            }

            // Allow debugbar
            if ($locale === '_debugbar') {
                return 'debugbar';
            }

            throw new InvalidLocale("Invalid locale: {$locale}");
        }

        return $locale;
    }
}
