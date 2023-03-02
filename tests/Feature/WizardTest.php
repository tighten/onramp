<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WizardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_loads(): void
    {
        $this->withoutExceptionHandling();
        $this->be(User::factory()->create());
        $response = $this->get(route('wizard.index', ['locale' => 'en']));

        $response->assertStatus(200);
    }
}
