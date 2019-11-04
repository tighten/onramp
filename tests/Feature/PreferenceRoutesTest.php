<?php

namespace Tests\Feature;

use App\Facades\Preferences;
use App\User;
use Facades\App\Preferences\ResourceLanguagePreference;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PreferenceRoutesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function valid_preferences_posted_are_persisted()
    {
        $user = factory(User::class)->create();
        $key = ResourceLanguagePreference::key();
        $this->be($user);
        $response = $this->post(route_wlocale('user.preferences.store'), [
            $key => 'qwerty',
        ]);

        $this->assertEquals('qwerty', Preferences::get($key));
    }
}
