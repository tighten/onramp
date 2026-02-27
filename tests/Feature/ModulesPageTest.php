<?php

use App\Models\Module;
use App\Models\Track;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('module show loads', function () {
    $module = Module::factory()->create();
    $response = $this->get(route('modules.show', [
        'locale' => 'en',
        'module' => $module,
        'resourceType' => 'free-resources',
    ]));
    $response->assertOk();
});

test('module can access previous and next module', function () {
    $modules = Module::factory(4)->create();
    $current = $modules->skip(2)->first();
    $prev = $modules->skip(1)->first();
    $next = $modules->last();

    expect($current->getPrevious()->id)->toEqual($prev->id);
    expect($current->getNext()->id)->toEqual($next->id);
});

test('modules index page lists modules', function () {
    $standardModule = Module::factory()->create([
        'name' => 'Standard module',
        'is_bonus' => 0,
    ]);

    $bonusModule = Module::factory()->create([
        'name' => 'Bonus module',
        'is_bonus' => 1,
    ]);

    $response = $this->get(route('modules.index', ['locale' => 'en']));

    $response->assertSeeInOrder([
        $standardModule->name,
        $bonusModule->name,
    ]);
});

test('modules index page loads if the user has not selected a track', function () {
    $user = User::factory()->create();

    if ($user->track) {
        $user->track()->dissociate();
    }

    $response = $this->actingAs($user)->get(route('modules.index', ['locale' => 'en']));

    $response->assertSuccessful();
});

test('list of bonus modules only contains bonus modules', function () {
    $standardModule = Module::factory()->create([
        'name' => 'Standard module',
        'is_bonus' => 0,
    ]);

    $bonusModule = Module::factory()->create([
        'name' => 'Bonus module',
        'is_bonus' => 1,
    ]);

    $response = $this->get(route('modules.index', ['locale' => 'en']));

    $response->assertViewHas('bonusModules', function ($bonusModules) {
        return $bonusModules->count() === 1;
    });

    $response->assertViewHas('bonusModules', function ($bonusModules) use ($bonusModule) {
        return $bonusModules->contains($bonusModule);
    });

    $response->assertViewHas('bonusModules', function ($bonusModules) use ($standardModule) {
        return ! $bonusModules->contains($standardModule);
    });
});

test('list of user modules only contains modules in users track', function () {
    $track = Track::factory()->create();
    $otherTrack = Track::factory()->create();
    $track->modules()->createMany(
        Module::factory()->count(3)->make([
            'is_bonus' => 0,
        ])->toArray()
    );
    $otherTrack->modules()->createMany(
        Module::factory()->count(2)->make([
            'is_bonus' => 0,
        ])->toArray()
    );
    $user = User::factory()->create([
        'track_id' => $track->id,
    ]);

    $response = $this->actingAs($user)->get(route('modules.index', ['locale' => 'en']));

    $response->assertViewHas('userModules', function ($modules) {
        return $modules->count() == 3;
    });
});

test('list of completed modules only contains modules completed by user', function () {
    $user = User::factory()->create();
    $anotherUser = User::factory()->create();
    $moduleA = Module::factory()->create();
    $moduleB = Module::factory()->create();
    $moduleC = Module::factory()->create();
    $user->complete($moduleA);
    $user->complete($moduleB);
    $anotherUser->complete($moduleC);

    $response = $this->actingAs($user)->get(route('modules.index', ['locale' => 'en']));

    $response->assertViewHas('completedModules', function ($modules) {
        return $modules->count() == 2;
    });
});
