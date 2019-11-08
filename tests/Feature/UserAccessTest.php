<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function users_with_user_role_cannot_update_users()
    {
        $user = factory(User::class)->create(['role' => 'user']);

        $this->assertFalse($user->can('update', User::class));
    }

    /** @test */
    function users_with_editor_role_can_update_users()
    {
        $user = factory(User::class)->create(['role' => 'editor']);

        $this->assertTrue($user->can('update', User::class));
    }

    /** @test */
    function users_with_admin_role_can_update_users()
    {
        $user = factory(User::class)->create(['role' => 'admin']);

        $this->assertTrue($user->can('update', User::class));
    }
}
