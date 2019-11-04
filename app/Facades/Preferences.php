<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Preferences extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'preferences';
    }
}
