<?php

namespace Tests\Feature;

use App\Facades\Preferences;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PreferenceRoutesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function resource_language_can_be_changed()
    {
        $this->be(factory(User::class)->create());
        $response = $this->post(route_wlocale('user.preferences.store'), [
            'resource-language' => 'local-and-english',
            'locale' => 'en',
            'operating-system' => 'macos',
        ]);

        $this->assertEquals('local-and-english', Preferences::get('resource-language'));
    }

    /** @test */
    function locale_can_be_changed()
    {
        $this->be(factory(User::class)->create());
        $response = $this->post(route_wlocale('user.preferences.store'), [
            'locale' => 'es',
            'resource-language' => 'local-and-english',
            'operating-system' => 'macos',
        ]);

        $this->assertEquals('es', Preferences::get('locale'));
    }

    /** @test */
    function operating_system_can_be_changed()
    {
        $this->be(factory(User::class)->create());
        $response = $this->post(route_wlocale('user.preferences.store'), [
            'operating-system' => 'linux',
            'locale' => 'es',
            'resource-language' => 'local-and-english',
        ]);

        $this->assertEquals('linux', Preferences::get('operating-system'));
    }
}
