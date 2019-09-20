<?php

namespace Tests\Feature;

use App\Completion;
use App\Resource;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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
    function user_cannot_complete_another_user()
    {
        $this->markTestIncomplete('@todo Only allow completion of valid models');

        $user = factory(User::class)->create();
        $otherUser = factory(User::class)->create();

        $user->complete($otherUser);

        $this->assertEquals(0, Completion::count());
    }

    /** @test */
    function user_can_list_completed_modules()
    {
        $this->markTestIncomplete('Write the completed modules method on user');

        $user = factory(User::class)->create();
        $module = factory(Module::class)->create();
        $otherModule = factory(Module::class)->create();
        $user->complete($module);

        // @todo write this method!
        // @todo might have to do module->id against an array of IDs
        $this->assertContains($module, $user->completedModules());
    }
}
