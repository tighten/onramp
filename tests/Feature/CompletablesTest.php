<?php

namespace Tests\Feature;

use App\Models\Completion;
use App\Models\Module;
use App\Models\Resource;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use TypeError;

class CompletablesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_complete_a_resource(): void
    {
        $user = User::factory()->create();
        $resource = Resource::factory()->create();

        $user->complete($resource);

        $this->assertEquals(1, Completion::count());
    }

    /** @test */
    public function user_can_undo_a_resource_completion(): void
    {
        $user = User::factory()->create();
        $resource = Resource::factory()->create();

        $user->complete($resource);
        $user->undoComplete($resource);

        $this->assertEquals(0, Completion::count());
    }

    /** @test */
    public function user_can_complete_a_module(): void
    {
        $user = User::factory()->create();
        $module = Module::factory()->create();

        $user->complete($module);

        $this->assertEquals(1, Completion::count());
    }

    /** @test */
    public function user_can_undo_a_module_completion(): void
    {
        $user = User::factory()->create();
        $module = Module::factory()->create();

        $user->complete($module);
        $user->undoComplete($module);

        $this->assertEquals(0, Completion::count());
    }

    /** @test */
    public function user_can_complete_a_skill(): void
    {
        $user = User::factory()->create();
        $skill = Skill::factory()->create();

        $user->complete($skill);

        $this->assertEquals(1, Completion::count());
    }

    /** @test */
    public function user_can_undo_a_skill_completion(): void
    {
        $user = User::factory()->create();
        $skill = Skill::factory()->create();

        $user->complete($skill);
        $user->undoComplete($skill);

        $this->assertEquals(0, Completion::count());
    }

    /** @test */
    public function user_cannot_complete_another_user(): void
    {
        $this->expectException(TypeError::class);

        $user = User::factory()->create();
        $otherUser = User::factory()->create();

        $user->complete($otherUser);

        $this->assertEquals(0, Completion::count());
    }

    /** @test */
    public function user_can_list_module_completions(): void
    {
        $user = User::factory()->create();
        $module = Module::factory()->create();
        $otherModule = Module::factory()->create();
        $user->complete($otherModule);

        $this->assertContains($otherModule->id, $user->moduleCompletions->pluck('completable_id'));
        $this->assertNotContains($module->id, $user->moduleCompletions->pluck('completable_id'));
    }

    /** @test */
    public function user_can_list_resource_completions(): void
    {
        $user = User::factory()->create();
        $resource = Resource::factory()->create();
        $otherResource = Resource::factory()->create();
        $user->complete($otherResource);

        $this->assertContains($otherResource->id, $user->resourceCompletions->pluck('completable_id'));
        $this->assertNotContains($resource->id, $user->resourceCompletions->pluck('completable_id'));
    }

    /** @test */
    public function user_can_list_skill_completions(): void
    {
        $user = User::factory()->create();
        $skill = Skill::factory()->create();
        $otherSkill = Skill::factory()->create();
        $user->complete($otherSkill);

        $this->assertContains($otherSkill->id, $user->skillCompletions->pluck('completable_id'));
        $this->assertNotContains($skill->id, $user->skillCompletions->pluck('completable_id'));
    }
}
