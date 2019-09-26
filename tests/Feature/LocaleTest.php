<?php

namespace Tests\Feature;

use App\Localization\Locale;
use Tests\TestCase;

class LocaleTest extends TestCase
{
    /** @test */
    function english_is_valid()
    {
        $locales = new Locale;

        $this->assertTrue($locales->isValid('en'));
    }

    /** @test */
    function fandango_is_invalid()
    {
        $locales = new Locale;

        $this->assertFalse($locales->isValid('fandango'));
    }
}
