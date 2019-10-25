<?php

namespace Tests\Feature;

use App\User;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserPreferencesTest extends TestCase
{
    use RefreshDatabase;

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
        app('preferences')->set(['resource-language-preference' => 'local-and-english']);

        $this->assertEquals('local-and-english', app('preferences')->get('resource-language-preference'));
    }

    /** @test */
    function user_can_set_and_get_preferences_using_the_user_model()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $user->preferences(['resource-language-preference' => 'local-and-english']);

        $this->assertEquals('local-and-english', $user->preferences('resource-language-preference'));
    }

    /** @test */
    function get_honors_preference_defaults_if_user_hasnt_set_preferences()
    {
        $user = factory(User::class)->create([
            'preferences' => [],
        ]);
        $this->be($user);

        $this->assertEquals('local', app('preferences')->get('resource-language-preference'));
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
            app('preferences')->get('resource-language-preference', 'abcde')
        );
    }
}
