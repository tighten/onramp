<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function user_can_log_in()
    {
        $this->be($user = factory(User::class)->create());

        $response = $this->post('/en/login', [
            'email' => $user->email,
            'password' => $user->password,
        ]);

        $response->assertRedirect('/en/modules');
    }
}
