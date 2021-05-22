<?php

namespace Tests\Feature;

use App\Facades\Preferences;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PreferenceRoutesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function resource_language_can_be_changed()
    {
        $this->be(User::factory()->create());

        Preferences::set(['resource-language' => 'all']);

        $this->get('/en'); // Set locale
        $response = $this->patch(route_wlocale('user.preferences.update'), [
            'resource-language' => 'local-and-english',
            'locale' => 'en',
            'operating-system' => 'macos',
        ]);

        $this->assertEquals('local-and-english', Preferences::get('resource-language'));
    }

    /** @test */
    function locale_can_be_changed()
    {
        $this->be(User::factory()->create());

        $this->get('/en'); // Set locale
        $response = $this->patch(route_wlocale('user.preferences.update'), [
            'locale' => 'es',
            'resource-language' => 'local-and-english',
            'operating-system' => 'macos',
        ]);

        $this->assertEquals('es', Preferences::get('locale'));
    }

    /** @test */
    function operating_system_can_be_changed()
    {
        $this->be(User::factory()->create());

        Preferences::set(['operating-system' => 'windows']);

        $this->get('/en'); // Set locale
        $response = $this->patch(route_wlocale('user.preferences.update'), [
            'operating-system' => 'linux',
            'locale' => 'es',
            'resource-language' => 'local-and-english',
        ]);

        $this->assertEquals('linux', Preferences::get('operating-system'));
    }
}
