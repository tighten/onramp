<?php

namespace Tests\Feature;

use App\Module;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModuleAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function users_with_user_role_cannot_update_modules()
    {
        $user = factory(User::class)->create(['role' => 'user']);

        $this->assertFalse($user->can('update', new Module));
    }

    /** @test */
    function users_with_editor_role_can_update_modules()
    {
        $user = factory(User::class)->create(['role' => 'editor']);

        $this->assertTrue($user->can('update', new Module));
    }

    /** @test */
    function users_with_admin_role_can_update_modules()
    {
        $user = factory(User::class)->create(['role' => 'admin']);
        $module = factory(Module::class)->create();

        $this->assertTrue($user->can('update', new Module));
    }
}
