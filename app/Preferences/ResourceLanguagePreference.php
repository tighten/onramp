<?php

namespace App\Preferences;

class ResourceLanguagePreference extends Preference
{
    public function options()
    {
        return [
            'local' => __('Only resources for my language'),
            'all' => __('All resources'),
            'local-and-english' => __('Only resources for my language and English'),
        ];
    }

    public function default()
    {
        return 'local';
    }
}
