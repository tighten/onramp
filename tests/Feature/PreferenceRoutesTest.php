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
    function valid_preferences_posted_are_persisted()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $response = $this->post(route_wlocale('user.preferences.store'), [
            'resource-language' => 'local-and-english',
        ]);

        $this->assertEquals('local-and-english', Preferences::get('resource-language'));
    }
}
