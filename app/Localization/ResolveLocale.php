<?php

namespace App\Localization;

use App\Exceptions\InvalidLocale;
use App\Facades\Localization;
use Illuminate\Http\Request;

class ResolveLocale
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function __invoke()
    {
        $segments = $this->request->segments();

        if (count($segments) === 0) {
            return 'not-defined-because-at-site-root';
        }

        $locale = reset($segments);

        if (! Localization::isValid($locale)) {
            // Allow Nova passthrough
            if ($locale === 'nova' || $locale === 'nova-api') {
                return 'nova';
            }

            throw new InvalidLocale("Invalid locale: {$locale}");
        }

        return $locale;
    }
}
