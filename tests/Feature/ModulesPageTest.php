<?php

namespace Tests\Feature;

use App\Module;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModulesPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function module_show_loads()
    {
        $module = factory(Module::class)->create();
        $response = $this->get(route('modules.show', ['locale' => 'en', 'module' => $module]));
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
    function list_of_standard_modules_only_contains_standard_modules()
    {
        $standardModule = factory(Module::class)->create([
            'name' => 'Standard module',
            'is_bonus' => 0,
        ]);

        $bonusModule = factory(Module::class)->create([
            'name' => 'Bonus module',
            'is_bonus' => 1,
        ]);

        $response = $this->get("/en/modules");

        $response->assertViewHas('standardModules', function ($standardModules) {
            return $standardModules->count() == 1;
        });

        $response->assertViewHas('standardModules', function ($standardModules) use ($standardModule) {
            return $standardModules->contains($standardModule);
        });

        $response->assertViewHas('standardModules', function ($standardModules) use ($bonusModule) {
            return ! $standardModules->contains($bonusModule);
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

        $response->assertViewHas('standardModules', function ($bonusModules) {
            return $bonusModules->count() == 1;
        });

        $response->assertViewHas('bonusModules', function ($bonusModules) use ($bonusModule) {
            return $bonusModules->contains($bonusModule);
        });

        $response->assertViewHas('bonusModules', function ($bonusModules) use ($standardModule) {
            return !$bonusModules->contains($standardModule);
        });
    }
}
