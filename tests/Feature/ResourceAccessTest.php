<?php

namespace Tests\Feature;

use App\Models\Resource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResourceAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_with_user_role_cannot_update_resources()
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->assertFalse($user->can('update', new Resource));
    }

    /** @test */
    public function users_with_editor_role_can_update_resources()
    {
        $user = User::factory()->create(['role' => 'editor']);

        $this->assertTrue($user->can('update', new Resource));
    }

    /** @test */
    public function users_with_admin_role_can_update_resources()
    {
        $user = User::factory()->create(['role' => 'admin']);

        $this->assertTrue($user->can('update', new Resource));
    }
}
