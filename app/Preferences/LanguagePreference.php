<?php

namespace App\Preferences;

class LanguagePreference extends Preference
{
    public function options()
    {
        throw new \Exception('@Todo return all from DB');
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
