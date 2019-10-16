<?php

namespace App\Localization;

class Locale
{
    protected $locales = [
        'en' => "English",
        'es' => "Spanish [TODO translate]",
        'pt' => "Portuguese [TODO translate]",
        'sv' => "Swedish [TODO translate]",
    ];

    protected $localeToFlag = [
        'en' => "us",
        'es' => "es",
        'pt' => "pt",
        'sv' => "sv",
    ];

    public function all()
    {
        return $this->locales;
    }

    public function isValid($locale)
    {
        return in_array($locale, array_keys($this->locales));
    }

    public function getFlagForLocale(string $locale)
    {
        return $this->localeToFlag[$locale];
    }

    public function getLanguageForLocale(string $locale)
    {
        return $this->locales[$locale];
    }
}
