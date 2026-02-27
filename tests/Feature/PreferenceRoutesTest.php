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

    $this->assertEquals('local-and-english', Preferences::get('resource-language'));
});

test('locale can be changed', function () {
    $this->be(User::factory()->create());

    $this->get('/en'); // Set locale
    $response = $this->patch(route_wlocale('user.preferences.update'), [
        'locale' => 'es',
        'resource-language' => 'local-and-english',
        'operating-system' => 'macos',
    ]);

    $this->assertEquals('es', Preferences::get('locale'));
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

    $this->assertEquals('linux', Preferences::get('operating-system'));
});
