<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_with_user_role_cannot_update_users(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->assertFalse($user->can('update', new User));
    }

    /** @test */
    public function users_with_editor_role_cannot_update_users(): void
    {
        $user = User::factory()->create(['role' => 'editor']);

        $this->assertFalse($user->can('update', new User));
    }

    /** @test */
    public function users_with_admin_role_can_update_users(): void
    {
        $user = User::factory()->create(['role' => 'admin']);

        $this->assertTrue($user->can('update', new User));
    }
}
