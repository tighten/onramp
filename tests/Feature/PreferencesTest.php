<?php

namespace Tests\Feature;

use App\Module;
use App\Preferences\Preferences;
use App\User;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PreferencesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guests_can_use_pages_with_preferences_without_errors()
    {
        $module = factory(Module::class)->create();
        $response = $this->get('/en/modules/' . $module->slug . '/free-resources');
        $response->assertOk();
    }

    /** @test */
    function preference_service_uses_logged_in_user_by_default()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $preferences = new Preferences($user);
        $preferences->set(['resource-language' => 'def']);

        $this->assertEquals('def', app('preferences')->get('resource-language'));
    }

    /** @test */
    function preferences_not_defined_cannot_be_used()
    {
        $this->expectException(Exception::class);
        $user = factory(User::class)->create();
        $this->be($user);
        app('preferences')->set(['key' => 'value']);
    }

    /** @test */
    function user_can_set_and_get_preferences()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        app('preferences')->set(['resource-language' => 'local-and-english']);

        $this->assertEquals('local-and-english', app('preferences')->get('resource-language'));
    }

    /** @test */
    function get_honors_preference_defaults_if_user_hasnt_set_preferences()
    {
        $user = factory(User::class)->create([
            'preferences' => [],
        ]);
        $this->be($user);

        $this->assertEquals('local', app('preferences')->get('resource-language'));
    }

    /** @test */
    function get_can_have_default_overridden()
    {
        $user = factory(User::class)->create([
            'preferences' => [],
        ]);
        $this->be($user);

        $this->assertEquals(
            'abcde',
            app('preferences')->get('resource-language', 'abcde')
        );
    }
}
