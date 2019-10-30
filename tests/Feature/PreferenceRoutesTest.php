<?php

namespace Tests\Feature;

use App\Facades\Preferences;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PreferenceRoutesTest extends TestCase
{
    use RefreshDatabase;

    // @todo: Consider Dusk test here since this magic string can get out of
    // sync with the Vue and then it's not all that useful
    /** @test */
    function valid_preferences_posted_are_persisted()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $response = $this->post(route_wlocale('user.preferences.store'), [
            'resource-language-preference' => 'qwerty',
        ]);

        $this->assertEquals('qwerty', Preferences::get('resource-language-preference'));
    }
}
