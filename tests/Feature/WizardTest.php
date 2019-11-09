<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WizardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_loads()
    {
        $this->withoutExceptionHandling();
        $this->be(factory(User::class)->create());
        $response = $this->get(route('wizard.index', ['locale' => 'en']));

        $response->assertStatus(200);
    }
}
