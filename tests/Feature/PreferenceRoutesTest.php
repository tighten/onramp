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
        $user = factory(User::class)->create();
        $this->be($user);
        $response = $this->post(route_wlocale('user.preferences.store'), [
            'resource-language' => 'local-and-english',
        ]);

        $this->assertEquals('local-and-english', Preferences::get('resource-language'));
    }

    /** @test */
    function locale_can_be_changed()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $response = $this->post(route_wlocale('user.preferences.store'), [
            'locale' => 'es',
        ]);

        $this->assertEquals('es', Preferences::get('locale'));
    }

    /** @test */
    function operating_system_can_be_changed()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $response = $this->post(route_wlocale('user.preferences.store'), [
            'operating-system' => 'linux',
        ]);

        $this->assertEquals('linux', Preferences::get('operating-system'));
    }
}
