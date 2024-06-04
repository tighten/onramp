<?php

namespace Tests\Feature;

use App\Facades\Preferences;
use App\Models\Track;
use App\Models\User;
use App\OperatingSystem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WizardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_loads(): void
    {
        $this->withoutExceptionHandling();
        $this->be(User::factory()->create());
        $response = $this->get(route('wizard.index', ['locale' => 'en']));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_be_submitted(): void
    {
        $this->be($user = User::factory()->create());
        $response = $this->post(route('wizard.store', ['locale' => 'en']),
            [
                'os' => OperatingSystem::MACOS,
                'track' => $track_id = Track::factory()->create()->id,
                'locale' => 'en',
            ]
        );

        $response->assertStatus(302);
        $user->refresh();
        $this->assertEquals($track_id, $user->track_id);
        $this->assertEquals(OperatingSystem::MACOS, Preferences::get('operating-system'));
        $this->assertEquals('en', Preferences::get('locale'));
    }
}
