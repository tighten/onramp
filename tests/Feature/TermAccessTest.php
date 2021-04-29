<?php

namespace Tests\Feature;

use App\Term;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TermAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function users_with_user_role_cannot_update_terms()
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->assertFalse($user->can('update', new Term));
    }

    /** @test */
    function users_with_editor_role_can_update_terms()
    {
        $user = User::factory()->create(['role' => 'editor']);

        $this->assertTrue($user->can('update', new Term));
    }

    /** @test */
    function users_with_admin_role_can_update_terms()
    {
        $user = User::factory()->create(['role' => 'admin']);

        $this->assertTrue($user->can('update', new Term));
    }
}
