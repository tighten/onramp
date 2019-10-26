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
}
