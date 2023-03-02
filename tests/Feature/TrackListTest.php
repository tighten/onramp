<?php

namespace Tests\Feature;

use App\Models\Module;
use App\Models\Track;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrackListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function anyone_can_access_the_tracks_page(): void
    {
        $track = Track::factory()->create();
        $module = Module::factory()->create();
        $track->modules()->save($module);

        $response = $this->get(route('tracks', ['locale' => 'en']));

        $response->assertOk()
            ->assertSee($track->name)
            ->assertSee($module->name)
            ->assertSee('svg');
    }

    /** @test */
    public function it_doesnt_show_tracks_with_no_modules(): void
    {
        $track = Track::factory()->create();
        $response = $this->get(route('tracks', ['locale' => 'en']));

        $response->assertOk()
            ->assertDontSee($track->name);
    }
}
