<?php

namespace App\Localization;

use Exception;

class Locale
{
    protected $locales = [
        'en' => 'English',
        'es' => 'Español',
        'pt' => 'Português',
        'sv' => 'Svenska',
        'de' => 'Deutsch',
        'da' => 'Dansk',
    ];

    public function slugs()
    {
        return array_keys($this->locales);
    }

    public function isValid($locale)
    {
        return in_array($locale, array_keys($this->locales));
    }

    public function languageForLocale(string $locale)
    {
        if (!$this->isValid($locale)) {
            throw new Exception("Cannot resolve language for locale: {$locale}");
        }

        return $this->locales[$locale];
    }
}
