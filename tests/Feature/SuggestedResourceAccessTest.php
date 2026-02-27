<?php

use App\Models\SuggestedResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\NovaTestCase;

uses(Tests\NovaTestCase::class);
uses(RefreshDatabase::class);

test('users can view any suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $this->assertTrue($user->can('viewAny', SuggestedResource::class));
});

test('users can suggest resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $this->assertTrue($user->can('create', SuggestedResource::class));
});

test('users can see their own suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $user->id]);

    $this->assertTrue($user->can('view', $suggestedResource));
});

test('users can edit their own suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $user->id]);

    $this->assertTrue($user->can('update', $suggestedResource));
});

test('users can see other users suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $otherUser = User::factory()->create(['role' => 'user']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $otherUser->id]);

    $this->assertTrue($user->can('view', $suggestedResource));
});

test('users cannot edit other users suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $otherUser = User::factory()->create(['role' => 'user']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $otherUser->id]);

    $this->assertFalse($user->can('update', $suggestedResource));
});

test('users cannot delete other users suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $otherUser = User::factory()->create(['role' => 'user']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $otherUser->id]);

    $this->assertFalse($user->can('delete', $suggestedResource));
});

test('users can delete their own suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $user->id]);

    $this->assertTrue($user->can('delete', $suggestedResource));
});

test('admins can see and edit all suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $adminUser = User::factory()->create(['role' => 'admin']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $user->id]);

    $this->assertTrue($adminUser->can('view', $suggestedResource));
    $this->assertTrue($adminUser->can('update', $suggestedResource));
});

test('editors can see and edit all suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $editorUser = User::factory()->create(['role' => 'editor']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $user->id]);

    $this->assertTrue($editorUser->can('view', $suggestedResource));
    $this->assertTrue($editorUser->can('update', $suggestedResource));
});
