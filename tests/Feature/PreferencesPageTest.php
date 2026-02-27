<?php

use App\Facades\Preferences;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

it('loads', function () {
    $this->be(User::factory()->create());
    $response = $this->get(route('user.preferences.index', ['locale' => 'en']));

    $response->assertStatus(200);
});

it('modifies operating system when changed', function () {
    $this->withoutExceptionHandling();
    $this->be(User::factory()->create());

    $this->get('/en'); // Set locale
    $this->patch(route_wlocale('user.preferences.update'), [
        'locale' => 'en',
        'operating-system' => 'macos',
        'resource-language' => 'english',
    ]);

    $this->assertEquals('macos', Preferences::get('operating-system'));

    $response = $this->patch(route_wlocale('user.preferences.update'), [
        'locale' => 'en',
        'operating-system' => 'windows',
        'resource-language' => 'english',
    ]);

    $this->assertEquals('windows', Preferences::get('operating-system'));
});

test('on failed validation it persists old submitted values', function () {
    $this->markTestIncomplete();
});
