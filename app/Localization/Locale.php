<?php

namespace App\Localization;

class Locale
{
    protected $locales = [
        'en',
        'es',
        'pt',
        'sv',
        'de',
        'da',
    ];

    protected $localeToLanguage = [
        'en' => "English",
        'es' => "Spanish",    // [TODO translate]
        'pt' => "Portuguese", // [TODO translate]
        'sv' => "Swedish",    // [TODO translate]
        'de' => "German",    // [TODO translate]
        'da' => "Danish",    // [TODO translate]
    ];

    public function all()
    {
        return $this->locales;
    }

    public function isValid($locale)
    {
        return in_array($locale, $this->locales);
    }

    public function getLanguageForLocale(string $locale)
    {
        return $this->localeToLanguage[$locale];
    }
}
