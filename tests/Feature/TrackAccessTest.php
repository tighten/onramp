<?php

namespace Tests\Feature;

use App\Track;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrackAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function users_with_user_role_cannot_update_tracks()
    {
        $user = factory(User::class)->create(['role' => 'user']);

        $this->assertFalse($user->can('update', new Track));
    }

    /** @test */
    function users_with_editor_role_can_update_tracks()
    {
        $user = factory(User::class)->create(['role' => 'editor']);

        $this->assertTrue($user->can('update', new Track));
    }

    /** @test */
    function users_with_admin_role_can_update_tracks()
    {
        $user = factory(User::class)->create(['role' => 'admin']);

        $this->assertTrue($user->can('update', new Track));
    }
}
