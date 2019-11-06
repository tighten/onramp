<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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

    // @todo test every preference to make sure that it can be changed via the page
}
