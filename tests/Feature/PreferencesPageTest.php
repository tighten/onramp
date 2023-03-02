<?php

namespace Tests\Feature;

use App\Facades\Preferences;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PreferencesPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_loads(): void
    {
        $this->be(User::factory()->create());
        $response = $this->get(route('user.preferences.index', ['locale' => 'en']));

        $response->assertStatus(200);
    }

    /** @test */
    public function it_modifies_operating_system_when_changed(): void
    {
        $this->withoutExceptionHandling();
        $this->be(User::factory()->create());

        $this->get('/en'); // Set locale
        $this->patch(route_wlocale('user.preferences.update'), [
            'locale' => 'en',
            'operating-system' => 'macos',
            'resource-language' => 'english',
        ]);

        $this->assertEquals('macos', Preferences::get('operating-system'));

        $response = $this->patch(route_wlocale('user.preferences.update'), [
            'locale' => 'en',
            'operating-system' => 'windows',
            'resource-language' => 'english',
        ]);

        $this->assertEquals('windows', Preferences::get('operating-system'));
    }

    /** @test */
    public function on_failed_validation_it_persists_old_submitted_values(): void
    {
        $this->markTestIncomplete();
    }

    // @todo test every preference to make sure that it can be changed via the page
}
