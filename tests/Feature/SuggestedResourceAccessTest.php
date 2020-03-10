<?php

namespace Tests\Feature;

use App\SuggestedResource;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SuggestedResourceAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function users_can_view_any_suggested_resources()
    {
        $user = factory(User::class)->create(['role' => 'user']);
        $this->assertTrue($user->can('viewAny', SuggestedResource::class));
    }

    /** @test */
    function users_can_suggest_resources()
    {
        $user = factory(User::class)->create(['role' => 'user']);
        $this->assertTrue($user->can('create', SuggestedResource::class));
    }

    /** @test */
    function users_can_see_their_own_suggested_resources()
    {
        $user = factory(User::class)->create(['role' => 'user']);
        $suggestedResource = factory(SuggestedResource::class)->create(['user_id' => $user->id]);

        $this->assertTrue($user->can('view', $suggestedResource));
    }

    /** @test */
    function users_can_edit_their_own_suggested_resources()
    {
        $user = factory(User::class)->create(['role' => 'user']);
        $suggestedResource = factory(SuggestedResource::class)->create(['user_id' => $user->id]);

        $this->assertTrue($user->can('update', $suggestedResource));
    }

    /** @test */
    function users_can_see_other_users_suggested_resources()
    {
        $user = factory(User::class)->create(['role' => 'user']);
        $otherUser = factory(User::class)->create(['role' => 'user']);
        $suggestedResource = factory(SuggestedResource::class)->create(['user_id' => $otherUser->id]);

        $this->assertTrue($user->can('view', $suggestedResource));
    }

    /** @test */
    function users_cannot_edit_other_users_suggested_resources()
    {
        $user = factory(User::class)->create(['role' => 'user']);
        $otherUser = factory(User::class)->create(['role' => 'user']);
        $suggestedResource = factory(SuggestedResource::class)->create(['user_id' => $otherUser->id]);

        $this->assertFalse($user->can('update', $suggestedResource));
    }

    /** @test */
    function users_cannot_delete_other_users_suggested_resources()
    {
        $user = factory(User::class)->create(['role' => 'user']);
        $otherUser = factory(User::class)->create(['role' => 'user']);
        $suggestedResource = factory(SuggestedResource::class)->create(['user_id' => $otherUser->id]);

        $this->assertFalse($user->can('delete', $suggestedResource));
    }

    /** @test */
    function users_can_delete_their_own_suggested_resources()
    {
        $user = factory(User::class)->create(['role' => 'user']);
        $suggestedResource = factory(SuggestedResource::class)->create(['user_id' => $user->id]);

        $this->assertTrue($user->can('delete', $suggestedResource));
    }

    /** @test */
    function admins_can_see_and_edit_all_suggested_resources()
    {
        $user = factory(User::class)->create(['role' => 'user']);
        $adminUser = factory(User::class)->create(['role' => 'admin']);
        $suggestedResource = factory(SuggestedResource::class)->create(['user_id' => $user->id]);

        $this->assertTrue($adminUser->can('view', $suggestedResource));
        $this->assertTrue($adminUser->can('update', $suggestedResource));
    }

    /** @test */
    function editors_can_see_and_edit_all_suggested_resources()
    {
        $user = factory(User::class)->create(['role' => 'user']);
        $editorUser = factory(User::class)->create(['role' => 'editor']);
        $suggestedResource = factory(SuggestedResource::class)->create(['user_id' => $user->id]);

        $this->assertTrue($editorUser->can('view', $suggestedResource));
        $this->assertTrue($editorUser->can('update', $suggestedResource));
    }
}
