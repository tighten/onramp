<?php

use App\Localization\Locale;
use Tests\TestCase;

uses(Tests\TestCase::class);

test('english is valid', function () {
    $locales = new Locale;
    $this->assertTrue($locales->isValid('en'));
});

test('fandango is invalid', function () {
    $locales = new Locale;
    $this->assertFalse($locales->isValid('fandango'));
});

test('if throws an exception when resolving a language for an invalid locale', function () {
    $invalid = 'invalid_locale';

    $this->expectException(Exception::class);
    $this->expectExceptionMessage('Cannot resolve language for locale: ' . $invalid);

    $locales = new Locale;
    $locales->languageForLocale($invalid);
});

it('retrieves the proper language for a given locale', function () {
    // We don't need to test all of them, just a few
    $locales = new Locale;
    $this->assertEquals('English', $locales->languageForLocale('en'));
    $this->assertEquals('Español', $locales->languageForLocale('es'));
    $this->assertEquals('Dansk', $locales->languageForLocale('da'));
});
