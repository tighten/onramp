<?php

namespace Tests\Feature;

use App\Models\SuggestedResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\NovaTestCase;

class SuggestedResourceAccessTest extends NovaTestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_can_view_any_suggested_resources(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $this->assertTrue($user->can('viewAny', SuggestedResource::class));
    }

    /** @test */
    public function users_can_suggest_resources(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $this->assertTrue($user->can('create', SuggestedResource::class));
    }

    /** @test */
    public function users_can_see_their_own_suggested_resources(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $suggestedResource = SuggestedResource::factory()->create(['user_id' => $user->id]);

        $this->assertTrue($user->can('view', $suggestedResource));
    }

    /** @test */
    public function users_can_edit_their_own_suggested_resources(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $suggestedResource = SuggestedResource::factory()->create(['user_id' => $user->id]);

        $this->assertTrue($user->can('update', $suggestedResource));
    }

    /** @test */
    public function users_can_see_other_users_suggested_resources(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $otherUser = User::factory()->create(['role' => 'user']);
        $suggestedResource = SuggestedResource::factory()->create(['user_id' => $otherUser->id]);

        $this->assertTrue($user->can('view', $suggestedResource));
    }

    /** @test */
    public function users_cannot_edit_other_users_suggested_resources(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $otherUser = User::factory()->create(['role' => 'user']);
        $suggestedResource = SuggestedResource::factory()->create(['user_id' => $otherUser->id]);

        $this->assertFalse($user->can('update', $suggestedResource));
    }

    /** @test */
    public function users_cannot_delete_other_users_suggested_resources(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $otherUser = User::factory()->create(['role' => 'user']);
        $suggestedResource = SuggestedResource::factory()->create(['user_id' => $otherUser->id]);

        $this->assertFalse($user->can('delete', $suggestedResource));
    }

    /** @test */
    public function users_can_delete_their_own_suggested_resources(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $suggestedResource = SuggestedResource::factory()->create(['user_id' => $user->id]);

        $this->assertTrue($user->can('delete', $suggestedResource));
    }

    /** @test */
    public function admins_can_see_and_edit_all_suggested_resources(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $adminUser = User::factory()->create(['role' => 'admin']);
        $suggestedResource = SuggestedResource::factory()->create(['user_id' => $user->id]);

        $this->assertTrue($adminUser->can('view', $suggestedResource));
        $this->assertTrue($adminUser->can('update', $suggestedResource));
    }

    /** @test */
    public function editors_can_see_and_edit_all_suggested_resources(): void
    {
        $user = User::factory()->create(['role' => 'user']);
        $editorUser = User::factory()->create(['role' => 'editor']);
        $suggestedResource = SuggestedResource::factory()->create(['user_id' => $user->id]);

        $this->assertTrue($editorUser->can('view', $suggestedResource));
        $this->assertTrue($editorUser->can('update', $suggestedResource));
    }
}
