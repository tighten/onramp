<?php

namespace App\Preferences;

use Facades\App\Localization\Locale;

class LanguagePreference extends Preference
{
    public function options()
    {
        return Locale::locales();
    }

    public function key()
    {
        return 'language';
    }

    public function default()
    {
        return 'english';
    }
}
