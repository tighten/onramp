<?php

namespace Tests\Feature;

use App\Localization\Locales;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LocalesTest extends TestCase
{
    /** @test */
    function english_is_valid()
    {
        $locales = new Locales;

        $this->assertTrue($locales->isValid('en'));
    }

    /** @test */
    function fandango_is_invalid()
    {
        $locales = new Locales;

        $this->assertFalse($locales->isValid('fandango'));
    }
}
