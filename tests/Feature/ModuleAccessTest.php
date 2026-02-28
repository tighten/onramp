<?php

use App\Models\Module;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('users with user role can only view modules', function () {
    $user = User::factory()->create(['role' => 'user']);

    $this->assertTrue($user->can('view', new Module));
    $this->assertTrue($user->can('viewAny', new Module));
    $this->assertFalse($user->can('update', new Module));
    $this->assertFalse($user->can('create', new Module));
    $this->assertFalse($user->can('delete', new Module));
});

test('users with editor role can only view modules', function () {
    $user = User::factory()->create(['role' => 'editor']);

    $this->assertTrue($user->can('view', new Module));
    $this->assertTrue($user->can('viewAny', new Module));
    $this->assertFalse($user->can('update', new Module));
    $this->assertFalse($user->can('create', new Module));
    $this->assertFalse($user->can('delete', new Module));
});

test('users with editor role cannot attach track to module', function () {
    $user = User::factory()->create(['role' => 'editor']);

    $this->assertFalse($user->can('attachTrack', new Module));
});

test('users with editor role can attach and detach resources to module', function () {
    $user = User::factory()->create(['role' => 'editor']);

    $this->assertTrue($user->can('attachResource', [new Module, new Resource]));
    $this->assertTrue($user->can('detachResource', [new Module, new Resource]));
});

test('users with admin role can update modules', function () {
    $user = User::factory()->create(['role' => 'admin']);
    $module = Module::factory()->create();

    $this->assertTrue($user->can('update', new Module));
});
