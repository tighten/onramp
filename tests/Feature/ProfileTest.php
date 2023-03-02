<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_can_access_their_profile_page(): void
    {
        $user = User::factory()->create();

        $this->be($user)->get(route_wlocale('user.profile.show'))
            ->assertStatus(200);
    }

    /** @test */
    public function users_can_update_their_profile_settings(): void
    {
        $user = User::factory()->create([
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
    public function only_authenticated_users_can_update_their_profile(): void
    {
        $response = $this->put(route_wlocale('user.profile.update'));

        $response->assertRedirect(route_wlocale('login'));
    }

    /** @test */
    public function updating_user_profile_requires_a_name_and_email(): void
    {
        $user = User::factory()->create();

        $response = $this->be($user)->put(route_wlocale('user.profile.update'));

        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function updating_user_profile_requires_a_valid_email(): void
    {
        $user = User::factory()->create();

        $response = $this->be($user)->put(route_wlocale('user.profile.update'), [
            'email' => 'invalid',
        ]);

        $response->assertSessionHasErrors('email');
    }
}
