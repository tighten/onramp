<?php

namespace Tests\Feature;

use App\Module;
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
            $bonusModule->name,
            $standardModule->name,
        ]);
    }

    /** @test */
    function list_of_beginner_modules_only_contains_beginner_modules()
    {
        $beginnerModule = factory(Module::class)->create([
            'name' => 'Beginner module',
            'is_bonus' => 0,
        ]);

        $bonusModule = factory(Module::class)->create([
            'name' => 'Bonus module',
            'is_bonus' => 1,
        ]);

        $response = $this->get('/en/modules');

        $response->assertViewHas('standardBeginnerModules', function ($beginnerModules) {
            return $beginnerModules->count() == 1;
        });

        $response->assertViewHas('standardBeginnerModules', function ($beginnerModules) use ($beginnerModule) {
            return $beginnerModules->contains($beginnerModule);
        });

        $response->assertViewHas('standardBeginnerModules', function ($beginnerModules) use ($bonusModule) {
            return ! $beginnerModules->contains($bonusModule);
        });
    }

    /** @test */
    function list_of_intermediate_modules_only_contains_intermediate_modules()
    {
        $intermediateModule = factory(Module::class)->create([
            'name' => 'Intermediate module',
            'is_bonus' => 0,
            'skill_level' => 'intermediate',
        ]);

        $bonusModule = factory(Module::class)->create([
            'name' => 'Bonus module',
            'is_bonus' => 1,
        ]);

        $response = $this->get('/en/modules');

        $response->assertViewHas('standardIntermediateModules', function ($intermediateModules) {
            return $intermediateModules->count() == 1;
        });

        $response->assertViewHas('standardIntermediateModules', function ($intermediateModules) use ($intermediateModule) {
            return $intermediateModules->contains($intermediateModule);
        });

        $response->assertViewHas('standardIntermediateModules', function ($intermediateModules) use ($bonusModule) {
            return ! $intermediateModules->contains($bonusModule);
        });
    }

    /** @test */
    function list_of_advanced_modules_only_contains_advanced_modules()
    {
        $advancedModule = factory(Module::class)->create([
            'name' => 'Advanced module',
            'is_bonus' => 0,
            'skill_level' => 'advanced',
        ]);

        $bonusModule = factory(Module::class)->create([
            'name' => 'Bonus module',
            'is_bonus' => 1,
        ]);

        $response = $this->get('/en/modules');

        $response->assertViewHas('standardAdvancedModules', function ($advancedModules) {
            return $advancedModules->count() == 1;
        });

        $response->assertViewHas('standardAdvancedModules', function ($advancedModules) use ($advancedModule) {
            return $advancedModules->contains($advancedModule);
        });

        $response->assertViewHas('standardAdvancedModules', function ($advancedModules) use ($bonusModule) {
            return ! $advancedModules->contains($bonusModule);
        });
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
}
