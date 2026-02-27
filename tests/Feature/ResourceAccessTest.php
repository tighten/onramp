<?php

use App\Models\Resource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('users with user role cannot update resources', function () {
    $user = User::factory()->create(['role' => 'user']);

    $this->assertFalse($user->can('update', new Resource));
});

test('users with editor role can update resources', function () {
    $user = User::factory()->create(['role' => 'editor']);

    $this->assertTrue($user->can('update', new Resource));
});

test('users with admin role can update resources', function () {
    $user = User::factory()->create(['role' => 'admin']);

    $this->assertTrue($user->can('update', new Resource));
});
