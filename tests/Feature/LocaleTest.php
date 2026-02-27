<?php

use App\Localization\Locale;
use Tests\TestCase;

uses(Tests\TestCase::class);

test('english is valid', function () {
    $locales = new Locale;
    expect($locales->isValid('en'))->toBeTrue();
});

test('fandango is invalid', function () {
    $locales = new Locale;
    expect($locales->isValid('fandango'))->toBeFalse();
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
    expect($locales->languageForLocale('en'))->toEqual('English');
    expect($locales->languageForLocale('es'))->toEqual('Español');
    expect($locales->languageForLocale('da'))->toEqual('Dansk');
});
