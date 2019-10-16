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

    public function all()
    {
        return $this->locales;
    }

    public function isValid($locale)
    {
        return in_array($locale, array_keys($this->locales));
    }
}
