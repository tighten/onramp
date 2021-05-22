<?php

namespace Tests\Feature;

use App\Models\Completion;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompletionsApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_completes_a_passed_in_resource()
    {
        $this->be(User::factory()->create());
        $resource = Resource::factory()->create();

        $response = $this->post(route_wlocale('user.completions.store'), [
            'completable_type' => $resource->getMorphClass(),
            'completable_id' => $resource->id,
        ]);

        $this->assertEquals(1, Completion::count());
    }

    /** @test */
    function it_deletes_a_passed_in_resources_completion()
    {
        $this->be($user = User::factory()->create());
        $resource = Resource::factory()->create();

        Completion::create([
            'completable_type' => $resource->getMorphClass(),
            'completable_id' => $resource->id,
            'user_id' => $user->id,
        ]);

        $this->assertEquals(1, Completion::count());

        $response = $this->delete(route_wlocale('user.completions.destroy'), [
            'completable_type' => $resource->getMorphClass(),
            'completable_id' => $resource->id,
        ]);

        $this->assertEquals(0, Completion::count());
    }

    /** @test */
    function non_authenticated_users_cannot_delete_completions()
    {
        $user = User::factory()->create();
        $resource = Resource::factory()->create();

        Completion::create([
            'completable_type' => $resource->getMorphClass(),
            'completable_id' => $resource->id,
            'user_id' => $user->id,
        ]);

        $this->delete(route_wlocale('user.completions.destroy'), [
            'completable_type' => $resource->getMorphClass(),
            'completable_id' => $resource->id,
        ]);

        $this->assertEquals(1, Completion::count());
    }
}
