<?php

namespace App\Localization;

use Exception;

class Locale
{
    protected $locales = [
        'en' => 'English',
        'es' => 'Español',
        'pt_pt' => 'Português',
        'sv' => 'Svenska',
        'de' => 'Deutsch',
        'da' => 'Dansk',
        'cs' => 'Čeština',
        'id' => 'Bahasa',
        'fr' => 'French',
        'pl' => 'Polski',
    ];

    public function all()
    {
        return $this->locales;
    }

    public function slugs()
    {
        asort($this->locales);

        return array_keys($this->locales);
    }

    public function isValid($locale)
    {
        return array_key_exists($locale, $this->locales);
    }

    public function languageForLocale(string $locale)
    {
        if (! $this->isValid($locale)) {
            throw new Exception("Cannot resolve language for locale: {$locale}");
        }

        return $this->locales[$locale];
    }
}
