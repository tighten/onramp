<?php

namespace App\Preferences;

use Facades\App\Localization\Locale;

class LocalePreference extends Preference
{
    public function options()
    {
        return Locale::locales();
    }

    public function default()
    {
        return 'en';
    }
}
