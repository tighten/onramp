<?php

namespace Tests\Feature;

use App\Module;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModulesPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function modules_index_loads()
    {
        $response = $this->get(route('modules.index', ['locale' => 'en']));

        $response->assertOk();
    }

    /** @test */
    function module_show_loads()
    {
        $module = factory(Module::class)->create();
        $response = $this->get(route('modules.show', ['locale' => 'en', 'module' => $module]));
        $response->assertOk();
    }
}
