<?php

namespace Tests\Feature;

use App\Module;
use App\Track;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrackRoutesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_adds_a_module_to_the_current_users_track()
    {
        $user = factory(User::class)->create([
            'track_id' => factory(Track::class)->create()->id,
        ]);

        $module = factory(Module::class)->create();

        $this->actingAs($user);

        $this->patch(route('user.track.update', [
            'locale' => 'en',
            'module_id' => $module->id,
        ]));

        $this->assertTrue($user->track->modules->contains($module->id));
    }
}
