<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Localization extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Localization\Locale::class;
    }
}
