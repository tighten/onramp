<?php

namespace Tests\Feature;

use App\Localization\Locale;
use Exception;
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

    /** @test */
    function if_throws_an_exception_when_resolving_a_language_for_an_invalid_locale()
    {
        $invalid = 'invalid_locale';

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Cannot resolve language for locale: ' . $invalid);

        $locales = new Locale;
        $locales->languageForLocale($invalid);
    }

    /** @test */
    function it_retrieves_the_proper_language_for_a_given_locale()
    {
        // We don't need to test all of them, just a few
        $locales = new Locale;
        $this->assertEquals('English', $locales->languageForLocale('en'));
        $this->assertEquals('Español', $locales->languageForLocale('es'));
        $this->assertEquals('Dansk', $locales->languageForLocale('da'));
    }
}
