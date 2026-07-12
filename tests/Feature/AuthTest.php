<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class);
uses(RefreshDatabase::class);

test('guests are redirected to the locale-prefixed login page', function () {
    $this->get('/en/profile')->assertRedirect('/en/login');
});

test('guest json requests receive 401 instead of a redirect', function () {
    $this->getJson('/en/profile')->assertUnauthorized();
});

test('user can log in', function () {
    $user = User::factory()->create();

    $response = $this->post('/en/login', [
        'email' => $user->email,
        'password' => 'password',
        'remember' => true,
    ]);

    $response->assertRedirect('/en/modules');
});
