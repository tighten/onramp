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

    /** @test */
    public function if_throws_an_exception_when_resolving_a_language_for_an_invalid_locale()
    {

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Cannot resolve language for locale: invalid_locale');

        $locales = new Locale;
        $locales->getLanguageForLocale('invalid_locale');

    }

    /** @test */
    public function it_retrieves_the_proper_language_for_a_given_locale()
    {
        $locales = new Locale;

        // TODO: Replace language names with translated variants.
        $this->assertEquals('English', $locales->getLanguageForLocale('en'));
        $this->assertEquals('Spanish', $locales->getLanguageForLocale('es'));
        $this->assertEquals('Portuguese', $locales->getLanguageForLocale('pt'));
        $this->assertEquals('Swedish', $locales->getLanguageForLocale('sv'));
        $this->assertEquals('German', $locales->getLanguageForLocale('de'));
        $this->assertEquals('Danish', $locales->getLanguageForLocale('da'));
    }
}
