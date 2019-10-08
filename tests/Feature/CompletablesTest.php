<?php

namespace Tests\Feature;

use App\Completion;
use App\Module;
use App\Resource;
use App\Skill;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use TypeError;

class CompletablesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function user_can_complete_a_resource()
    {
        $user = factory(User::class)->create();
        $resource = factory(Resource::class)->create();

        $user->complete($resource);

        $this->assertEquals(1, Completion::count());
    }

    /** @test */
    function user_can_undo_a_resource_completion()
    {
        $user = factory(User::class)->create();
        $resource = factory(Resource::class)->create();

        $user->complete($resource);
        $user->undoComplete($resource);

        $this->assertEquals(0, Completion::count());
    }

    /** @test */
    function user_cannot_complete_another_user()
    {
        $this->expectException(TypeError::class);

        $user = factory(User::class)->create();
        $otherUser = factory(User::class)->create();

        $user->complete($otherUser);

        $this->assertEquals(0, Completion::count());
    }

    /** @test */
    function user_can_list_module_completions()
    {
        $user = factory(User::class)->create();
        $module = factory(Module::class)->create();
        $otherModule = factory(Module::class)->create();
        $user->complete($otherModule);

        $this->assertContains($otherModule->id, $user->moduleCompletions->pluck('completable_id'));
        $this->assertNotContains($module->id, $user->moduleCompletions->pluck('completable_id'));
    }

    /** @test */
    function user_can_list_resource_completions()
    {
        $user = factory(User::class)->create();
        $resource = factory(Resource::class)->create();
        $otherResource = factory(Resource::class)->create();
        $user->complete($otherResource);

        $this->assertContains($otherResource->id, $user->resourceCompletions->pluck('completable_id'));
        $this->assertNotContains($resource->id, $user->resourceCompletions->pluck('completable_id'));
    }

    /** @test */
    function user_can_list_skill_completions()
    {
        $user = factory(User::class)->create();
        $skill = factory(Skill::class)->create();
        $otherSkill = factory(Skill::class)->create();
        $user->complete($otherSkill);

        $this->assertContains($otherSkill->id, $user->skillCompletions->pluck('completable_id'));
        $this->assertNotContains($skill->id, $user->skillCompletions->pluck('completable_id'));
    }
}
