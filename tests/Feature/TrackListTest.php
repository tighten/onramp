<?php

use App\Models\Module;
use App\Models\Track;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('anyone can access the tracks page', function () {
    $track = Track::factory()->create();
    $module = Module::factory()->create();
    $track->modules()->save($module);

    $response = $this->get(route('tracks', ['locale' => 'en']));

    $response->assertOk()
        ->assertSee($track->name)
        ->assertSee($module->name)
        ->assertSee('svg');
});

it('doesnt show tracks with no modules', function () {
    $track = Track::factory()->create();
    $response = $this->get(route('tracks', ['locale' => 'en']));

    $response->assertOk()
        ->assertDontSee($track->name);
});
