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

    protected $localeToLanguage = [

    ];

    public function all()
    {
        return array_keys($this->locales);
    }

    public function isValid($locale)
    {
        return array_key_exists($locale, $this->locales);
    }

    public function getLanguageForLocale(string $locale)
    {
        if (!$this->isValid($locale)) {
            throw new Exception("Cannot resolve language for locale: {$locale}");
        }

        return $this->locales[$locale];
    }
}
