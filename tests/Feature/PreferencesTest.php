<?php

use App\Models\Module;
use App\Models\User;
use App\Preferences\Preferences;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('guests can use pages with preferences without errors', function () {
    $module = Module::factory()->create();
    $response = $this->get('/en/modules/' . $module->slug . '/free-resources');
    $response->assertOk();
});

test('preference service uses logged in user by default', function () {
    $user = User::factory()->create();
    $this->be($user);
    $preferences = new Preferences($user);
    $preferences->set(['resource-language' => 'def']);

    $this->assertEquals('def', app('preferences')->get('resource-language'));
});

test('preferences not defined cannot be used', function () {
    $this->expectException(Exception::class);
    $user = User::factory()->create();
    $this->be($user);
    app('preferences')->set(['key' => 'value']);
});

test('user can set and get preferences', function () {
    $user = User::factory()->create();
    $this->be($user);
    app('preferences')->set(['resource-language' => 'local-and-english']);

    $this->assertEquals('local-and-english', app('preferences')->get('resource-language'));
});

test('get honors preference defaults if user hasnt set preferences', function () {
    $user = User::factory()->create([
        'preferences' => [],
    ]);
    $this->be($user);

    $this->assertEquals('local', app('preferences')->get('resource-language'));
});

test('get can have default overridden', function () {
    $user = User::factory()->create([
        'preferences' => [],
    ]);
    $this->be($user);

    $this->assertEquals(
        'abcde',
        app('preferences')->get('resource-language', 'abcde')
    );
});
