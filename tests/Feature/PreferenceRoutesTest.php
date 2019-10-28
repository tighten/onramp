<?php

namespace Tests\Feature;

use App\Facades\Preferences;
use App\User;
use Exception;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PreferenceRoutesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function valid_preferences_posted_are_persisted()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $response = $this->post(route_wlocale('user.preferences.store'), [
            'language_preference' => 'qwerty'
        ]);

        $this->assertEquals('qwerty', Preferences::get('resource-language-preference'));
    }
}
