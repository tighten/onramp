<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function users_can_access_their_profile_page()
    {
        $user = factory(User::class)->create();

        $this->be($user)->get(route_wlocale('user.profile.show'))
            ->assertStatus(200);
    }

    /** @test */
    function users_can_update_their_profile_settings()
    {
        $user = factory(User::class)->create([
            'name' => 'Caleb Dume',
            'email' => 'test@example.com',
        ]);

        $response = $this->be($user)->put(route_wlocale('user.profile.update'), [
            'name' => 'Kanan Jarrus',
            'email' => 'updated@example.com',
        ]);

        tap($user->fresh(), function ($user) {
            $this->assertEquals('Kanan Jarrus', $user->name);
            $this->assertEquals('updated@example.com', $user->email);
        });

        $response->assertRedirect(route_wlocale('user.profile.show'));
    }

    /** @test */
    function only_authenticated_users_can_update_their_profile()
    {
        $response = $this->put(route_wlocale('user.profile.update'));

        $response->assertRedirect(route_wlocale('login'));
    }

    /** @test */
    function updating_user_profile_requires_a_name_and_email()
    {
        $user = factory(User::class)->create();

        $response = $this->be($user)->put(route_wlocale('user.profile.update'));

        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('email');
    }

    /** @test */
    function updating_user_profile_requires_a_valid_email()
    {
        $user = factory(User::class)->create();

        $response = $this->be($user)->put(route_wlocale('user.profile.update'), [
            'email' => 'invalid',
        ]);

        $response->assertSessionHasErrors('email');
    }
}
