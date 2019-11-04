<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PreferencesPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_loads()
    {
        $this->be(factory(User::class)->create());
        $response = $this->get(route('user.preferences.index', ['locale' => 'en']));

        $response->assertStatus(200);
    }
}
