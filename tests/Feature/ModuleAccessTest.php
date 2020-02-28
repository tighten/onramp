<?php

namespace Tests\Feature;

use App\Module;
use App\Resource;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModuleAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function users_with_user_role_can_only_view_modules()
    {
        $user = factory(User::class)->create(['role' => 'user']);

        $this->assertTrue($user->can('view', new Module));
        $this->assertTrue($user->can('viewAny', new Module));
        $this->assertFalse($user->can('update', new Module));
        $this->assertFalse($user->can('create', new Module));
        $this->assertFalse($user->can('delete', new Module));
    }

    /** @test */
    function users_with_editor_role_can_only_view_modules()
    {
        $user = factory(User::class)->create(['role' => 'editor']);

        $this->assertTrue($user->can('view', new Module));
        $this->assertTrue($user->can('viewAny', new Module));
        $this->assertFalse($user->can('update', new Module));
        $this->assertFalse($user->can('create', new Module));
        $this->assertFalse($user->can('delete', new Module));
    }

    /** @test */
    function users_with_editor_role_cannot_attach_track_to_module()
    {
        $user = factory(User::class)->create(['role' => 'editor']);

        $this->assertFalse($user->can('attachTrack', new Module));
    }

    /** @test */
    function users_with_editor_role_can_attach_and_detach_resources_to_module()
    {
        $user = factory(User::class)->create(['role' => 'editor']);

        $this->assertTrue($user->can('attachResource', [new Module, new Resource]));
        $this->assertTrue($user->can('detachResource', [new Module, new Resource]));
    }

    /** @test */
    function users_with_admin_role_can_update_modules()
    {
        $user = factory(User::class)->create(['role' => 'admin']);
        $module = factory(Module::class)->create();

        $this->assertTrue($user->can('update', new Module));
    }
}
