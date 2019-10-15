<?php

namespace App\Localization;

use Exception;
use Facades\App\Localization\Locale;
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

        if (! Locale::isValid($locale)) {
            throw new Exception("Invalid locale: {$locale}");
        }

        return $locale;
    }
}
