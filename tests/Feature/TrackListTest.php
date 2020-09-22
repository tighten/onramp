<?php

namespace Tests\Feature;

use App\Module;
use App\Track;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrackListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function anyone_can_access_the_tracks_page()
    {
        $track = factory(Track::class)->create();
        $module = factory(Module::class)->create();
        $track->modules()->save($module);

        $response = $this->get(route('tracks', ['locale' => 'en']));

        $response->assertOk()
            ->assertSee($track->name)
            ->assertSee($module->name)
            ->assertSee('svg');
    }

    /** @test */
    function it_doesnt_show_tracks_with_no_modules()
    {
        $track = factory(Track::class)->create();
        $response = $this->get(route('tracks', ['locale' => 'en']));

        $response->assertOk()
            ->assertDontSee($track->name);
    }
}
