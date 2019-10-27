<?php

namespace Tests\Feature;

use App\Module;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModulesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function modules_can_be_seen()
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

        $this->assertTrue(count($this->getResponseData($response, 'standardModules')) == 1);
        $this->assertTrue($this->getResponseData($response, 'standardModules')[0]->name == $standardModule->name);
        $this->assertFalse($this->getResponseData($response, 'standardModules')[0]->name == $bonusModule->name);
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

        $response = $this->get("/en/modules");

        $this->assertTrue(count($this->getResponseData($response, 'bonusModules')) == 1);
        $this->assertTrue($this->getResponseData($response, 'bonusModules')[0]->name == $bonusModule->name);
        $this->assertFalse($this->getResponseData($response, 'bonusModules')[0]->name == $standardModule->name);
    }
}
