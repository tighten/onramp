<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('users can access their profile page', function () {
    $user = User::factory()->create();

    $this->be($user)->get(route_wlocale('user.profile.show'))
        ->assertStatus(200);
});

test('users can update their profile settings', function () {
    $user = User::factory()->create([
        'name' => 'Caleb Dume',
        'email' => 'test@example.com',
    ]);

    $response = $this->be($user)->put(route_wlocale('user.profile.update'), [
        'name' => 'Kanan Jarrus',
        'email' => 'updated@example.com',
    ]);

    tap($user->fresh(), function ($user) {
        $this->assertEquals('Kanan Jarrus', $user->name);
        $this->assertEquals('updated@example.com', $user->email);
    });

    $response->assertRedirect(route_wlocale('user.profile.show'));
});

test('only authenticated users can update their profile', function () {
    $response = $this->put(route_wlocale('user.profile.update'));

    $response->assertRedirect(route_wlocale('login'));
});

test('updating user profile requires a name and email', function () {
    $user = User::factory()->create();

    $response = $this->be($user)->put(route_wlocale('user.profile.update'));

    $response->assertSessionHasErrors('name');
    $response->assertSessionHasErrors('email');
});

test('updating user profile requires a valid email', function () {
    $user = User::factory()->create();

    $response = $this->be($user)->put(route_wlocale('user.profile.update'), [
        'email' => 'invalid',
    ]);

    $response->assertSessionHasErrors('email');
});
