<?php

namespace Tests\Feature;

use App\User;
use App\SuggestedResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SuggestedResourceAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function users_can_see_their_own_suggested_resources()
    {
        $user = factory(User::class)->create(['role' => 'user']);
        $suggestedResource = factory(SuggestedResource::class)->create(['user_id' => $user->id]);

        $this->assertTrue($user->can('view', $suggestedResource));
    }

    /** @test */
    function users_cannot_see_other_users_suggested_resources()
    {
        $user = factory(User::class)->create(['role' => 'user']);
        $otherUser = factory(User::class)->create(['role' => 'user']);
        $suggestedResource = factory(SuggestedResource::class)->create(['user_id' => $otherUser->id]);

        $this->assertFalse($user->can('view', $suggestedResource));
    }

    /** @test */
    function admins_can_see_all_suggested_resources()
    {
        $user = factory(User::class)->create(['role' => 'user']);
        $adminUser = factory(User::class)->create(['role' => 'admin']);
        $suggestedResource = factory(SuggestedResource::class)->create(['user_id' => $user->id]);

        $this->assertTrue($adminUser->can('view', $suggestedResource));
    }
}
