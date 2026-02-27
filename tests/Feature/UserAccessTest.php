<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('users with user role cannot update users', function () {
    $user = User::factory()->create(['role' => 'user']);

    $this->assertFalse($user->can('update', new User));
});

test('users with editor role cannot update users', function () {
    $user = User::factory()->create(['role' => 'editor']);

    $this->assertFalse($user->can('update', new User));
});

test('users with admin role can update users', function () {
    $user = User::factory()->create(['role' => 'admin']);

    $this->assertTrue($user->can('update', new User));
});
