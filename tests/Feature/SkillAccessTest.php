<?php

namespace Tests\Feature;

use App\Skill;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SkillAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function users_with_user_role_cannot_view_skills()
    {
        $user = factory(User::class)->create(['role' => 'user']);

        $this->assertFalse($user->can('view', new Skill));
    }

    /** @test */
    function users_with_editor_role_can_only_view_skills()
    {
        $user = factory(User::class)->create(['role' => 'editor']);

        $this->assertTrue($user->can('view', new Skill));
        $this->assertTrue($user->can('viewAny', new Skill));
        $this->assertFalse($user->can('create', new Skill));
        $this->assertFalse($user->can('update', new Skill));
        $this->assertFalse($user->can('delete', new Skill));
    }
}
