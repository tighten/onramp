<?php

namespace Tests\Feature;

use App\Models\Module;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModuleAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_with_user_role_can_only_view_modules(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->assertTrue($user->can('view', new Module));
        $this->assertTrue($user->can('viewAny', new Module));
        $this->assertFalse($user->can('update', new Module));
        $this->assertFalse($user->can('create', new Module));
        $this->assertFalse($user->can('delete', new Module));
    }

    /** @test */
    public function users_with_editor_role_can_only_view_modules(): void
    {
        $user = User::factory()->create(['role' => 'editor']);

        $this->assertTrue($user->can('view', new Module));
        $this->assertTrue($user->can('viewAny', new Module));
        $this->assertFalse($user->can('update', new Module));
        $this->assertFalse($user->can('create', new Module));
        $this->assertFalse($user->can('delete', new Module));
    }

    /** @test */
    public function users_with_editor_role_cannot_attach_track_to_module(): void
    {
        $user = User::factory()->create(['role' => 'editor']);

        $this->assertFalse($user->can('attachTrack', new Module));
    }

    /** @test */
    public function users_with_editor_role_can_attach_and_detach_resources_to_module(): void
    {
        $user = User::factory()->create(['role' => 'editor']);

        $this->assertTrue($user->can('attachResource', [new Module, new Resource]));
        $this->assertTrue($user->can('detachResource', [new Module, new Resource]));
    }

    /** @test */
    public function users_with_admin_role_can_update_modules(): void
    {
        $user = User::factory()->create(['role' => 'admin']);
        $module = Module::factory()->create();

        $this->assertTrue($user->can('update', new Module));
    }
}
