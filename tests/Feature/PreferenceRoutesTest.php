<?php

use App\Facades\Preferences;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('resource language can be changed', function () {
    $this->be(User::factory()->create());

    Preferences::set(['resource-language' => 'all']);

    $this->get('/en'); // Set locale
    $response = $this->patch(route_wlocale('user.preferences.update'), [
        'resource-language' => 'local-and-english',
        'locale' => 'en',
        'operating-system' => 'macos',
    ]);

    expect(Preferences::get('resource-language'))->toEqual('local-and-english');
});

test('locale can be changed', function () {
    $this->be(User::factory()->create());

    $this->get('/en'); // Set locale
    $response = $this->patch(route_wlocale('user.preferences.update'), [
        'locale' => 'es',
        'resource-language' => 'local-and-english',
        'operating-system' => 'macos',
    ]);

    expect(Preferences::get('locale'))->toEqual('es');
});

test('operating system can be changed', function () {
    $this->be(User::factory()->create());

    Preferences::set(['operating-system' => 'windows']);

    $this->get('/en'); // Set locale
    $response = $this->patch(route_wlocale('user.preferences.update'), [
        'operating-system' => 'linux',
        'locale' => 'es',
        'resource-language' => 'local-and-english',
    ]);

    expect(Preferences::get('operating-system'))->toEqual('linux');
});
