<?php

use App\Models\Term;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('users with user role cannot update terms', function () {
    $user = User::factory()->create(['role' => 'user']);

    $this->assertFalse($user->can('update', new Term));
});

test('users with editor role can update terms', function () {
    $user = User::factory()->create(['role' => 'editor']);

    $this->assertTrue($user->can('update', new Term));
});

test('users with admin role can update terms', function () {
    $user = User::factory()->create(['role' => 'admin']);

    $this->assertTrue($user->can('update', new Term));
});
