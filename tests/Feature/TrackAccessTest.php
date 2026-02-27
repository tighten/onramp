<?php

use App\Models\Track;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('users with user role cannot update tracks', function () {
    $user = User::factory()->create(['role' => 'user']);

    $this->assertFalse($user->can('update', new Track));
});

test('users with editor role can only view tracks', function () {
    $user = User::factory()->create(['role' => 'editor']);

    $this->assertTrue($user->can('view', new Track));
    $this->assertTrue($user->can('viewAny', new Track));
    $this->assertFalse($user->can('update', new Track));
    $this->assertFalse($user->can('create', new Track));
    $this->assertFalse($user->can('delete', new Track));
});

test('users with editor role cannot attach module to track', function () {
    $user = User::factory()->create(['role' => 'editor']);

    $this->assertFalse($user->can('attachModule', new Track));
});

test('users with admin role can update tracks', function () {
    $user = User::factory()->create(['role' => 'admin']);

    $this->assertTrue($user->can('update', new Track));
});
