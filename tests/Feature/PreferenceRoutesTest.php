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
        $response = $this->post(route('user.preferences.store', ['locale' => 'en']), [
            'resource-language' => 'local-and-english',
        ]);

        $this->assertEquals('local-and-english', Preferences::get('resource-language'));
    }

    /** @test */
    function locale_can_be_changed()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $response = $this->post(route('user.preferences.store', ['locale' => 'en']), [
            'locale' => 'es',
        ]);

        $this->assertEquals('es', Preferences::get('locale'));
    }

    /** @test */
    function operating_system_can_be_changed()
    {
        $this->withExceptionHandling();
        $user = factory(User::class)->create();
        $this->be($user);
        $response = $this->post(route('user.preferences.store', ['locale' => 'en']), [
            'operating-system' => 'linux',
        ]);

        $this->assertEquals('linux', Preferences::get('operating-system'));
    }
}
