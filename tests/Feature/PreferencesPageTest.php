<?php

namespace Tests\Feature;

use App\Facades\Preferences;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PreferencesPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function it_loads()
    {
        $this->be(factory(User::class)->create());
        $response = $this->get(route('user.preferences.index', ['locale' => 'en']));

        $response->assertStatus(200);
    }

    /** @test */
    function it_modifies_operating_system_when_changed()
    {
        $this->withoutExceptionHandling();
        $this->be(factory(User::class)->create());

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
    function on_failed_validation_it_persists_old_submitted_values()
    {
        $this->markTestIncomplete();
    }

    // @todo test every preference to make sure that it can be changed via the page
}
