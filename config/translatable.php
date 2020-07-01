<?php

use App\Localization\Locale;

return [

    /*
     * If a translation has not been set for a given locale, use this locale instead.
     */
    'fallback_locale' => 'en',

    'locales' => (new Locale)->all(),
];
