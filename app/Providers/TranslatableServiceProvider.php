<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Translatable\Facades\Translatable;

class TranslatableServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Translatable::fallback(fallbackLocale: 'en');
    }
}
