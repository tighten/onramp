<?php

namespace Tests\Feature;

use App\Module;
use App\Track;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModulesPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function module_show_loads()
    {
        $module = factory(Module::class)->create();
        $response = $this->get(route('modules.show', [
            'locale' => 'en',
            'module' => $module,
            'resourceType' => 'free-resources',
        ]));
        $response->assertOk();
    }

    /** @test */
    function modules_index_page_lists_modules()
    {
        $standardModule = factory(Module::class)->create([
            'name' => 'Standard module',
            'is_bonus' => 0,
        ]);

        $bonusModule = factory(Module::class)->create([
            'name' => 'Bonus module',
            'is_bonus' => 1,
        ]);

        $response = $this->get(route('modules.index', ['locale' => 'en']));

        $response->assertSeeInOrder([
            $standardModule->name,
            $bonusModule->name,
        ]);
    }

    /** @test */
    function modules_index_page_loads_if_the_user_has_not_selected_a_track()
    {
        $user = factory(User::class)->create();

        if ($user->track) {
            $user->track()->dissociate();
        }

        $response = $this->actingAs($user)->get(route('modules.index', ['locale' => 'en']));

        $response->assertSuccessful();
    }

    /** @test */
    function list_of_bonus_modules_only_contains_bonus_modules()
    {
        $standardModule = factory(Module::class)->create([
            'name' => 'Standard module',
            'is_bonus' => 0,
        ]);

        $bonusModule = factory(Module::class)->create([
            'name' => 'Bonus module',
            'is_bonus' => 1,
        ]);

        $response = $this->get(route('modules.index', ['locale' => 'en']));

        $response->assertViewHas('bonusModules', function ($bonusModules) {
            return $bonusModules->count() == 1;
        });

        $response->assertViewHas('bonusModules', function ($bonusModules) use ($bonusModule) {
            return $bonusModules->contains($bonusModule);
        });

        $response->assertViewHas('bonusModules', function ($bonusModules) use ($standardModule) {
            return ! $bonusModules->contains($standardModule);
        });
    }

    /** @test */
    function list_of_user_modules_only_contains_modules_in_users_track()
    {
        $track = factory(Track::class)->create();
        $otherTrack = factory(Track::class)->create();
        $track->modules()->createMany(
            factory(Module::class, 3)->make([
                'is_bonus' => 0,
            ])->toArray()
        );
        $otherTrack->modules()->createMany(
            factory(Module::class, 2)->make([
                'is_bonus' => 0,
            ])->toArray()
        );
        $user = factory(User::class)->create([
            'track_id' => 1,
        ]);

        $response = $this->actingAs($user)->get(route('modules.index', ['locale' => 'en']));

        $response->assertViewHas('userModules', function ($modules) {
            return $modules->count() == 3;
        });
    }

    /** @test */
    function list_of_completed_modules_only_contains_modules_completed_by_user()
    {
        $user = factory(User::class)->create();
        $anotherUser = factory(User::class)->create();
        $moduleA = factory(Module::class)->create();
        $moduleB = factory(Module::class)->create();
        $moduleC = factory(Module::class)->create();
        $user->complete($moduleA);
        $user->complete($moduleB);
        $anotherUser->complete($moduleC);

        $response = $this->actingAs($user)->get(route('modules.index', ['locale' => 'en']));

        $response->assertViewHas('completedModules', function ($modules) {
            return $modules->count() == 2;
        });
    }
}
