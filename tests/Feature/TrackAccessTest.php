<?php

namespace Tests\Feature;

use App\Models\Track;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrackAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_with_user_role_cannot_update_tracks(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->assertFalse($user->can('update', new Track));
    }

    /** @test */
    public function users_with_editor_role_can_only_view_tracks(): void
    {
        $user = User::factory()->create(['role' => 'editor']);

        $this->assertTrue($user->can('view', new Track));
        $this->assertTrue($user->can('viewAny', new Track));
        $this->assertFalse($user->can('update', new Track));
        $this->assertFalse($user->can('create', new Track));
        $this->assertFalse($user->can('delete', new Track));
    }

    /** @test */
    public function users_with_editor_role_cannot_attach_module_to_track(): void
    {
        $user = User::factory()->create(['role' => 'editor']);

        $this->assertFalse($user->can('attachModule', new Track));
    }

    /** @test */
    public function users_with_admin_role_can_update_tracks(): void
    {
        $user = User::factory()->create(['role' => 'admin']);

        $this->assertTrue($user->can('update', new Track));
    }
}
