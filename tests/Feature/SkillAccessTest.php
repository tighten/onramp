<?php

use App\Models\Skill;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('users with user role cannot view skills', function () {
    $user = User::factory()->create(['role' => 'user']);

    $this->assertFalse($user->can('view', new Skill));
});

test('users with editor role can only view skills', function () {
    $user = User::factory()->create(['role' => 'editor']);

    $this->assertTrue($user->can('view', new Skill));
    $this->assertTrue($user->can('viewAny', new Skill));
    $this->assertFalse($user->can('create', new Skill));
    $this->assertFalse($user->can('update', new Skill));
    $this->assertFalse($user->can('delete', new Skill));
});
