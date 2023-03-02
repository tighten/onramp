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
    public function it_completes_a_passed_in_resource(): void
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
    public function it_deletes_a_passed_in_resources_completion(): void
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
    public function non_authenticated_users_cannot_delete_completions(): void
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
