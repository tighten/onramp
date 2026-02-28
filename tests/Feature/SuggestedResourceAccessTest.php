<?php

use App\Models\SuggestedResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\NovaTestCase::class);
uses(RefreshDatabase::class);

test('users can view any suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    expect($user->can('viewAny', SuggestedResource::class))->toBeTrue();
});

test('users can suggest resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    expect($user->can('create', SuggestedResource::class))->toBeTrue();
});

test('users can see their own suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $user->id]);

    expect($user->can('view', $suggestedResource))->toBeTrue();
});

test('users can edit their own suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $user->id]);

    expect($user->can('update', $suggestedResource))->toBeTrue();
});

test('users can see other users suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $otherUser = User::factory()->create(['role' => 'user']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $otherUser->id]);

    expect($user->can('view', $suggestedResource))->toBeTrue();
});

test('users cannot edit other users suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $otherUser = User::factory()->create(['role' => 'user']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $otherUser->id]);

    expect($user->can('update', $suggestedResource))->toBeFalse();
});

test('users cannot delete other users suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $otherUser = User::factory()->create(['role' => 'user']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $otherUser->id]);

    expect($user->can('delete', $suggestedResource))->toBeFalse();
});

test('users can delete their own suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $user->id]);

    expect($user->can('delete', $suggestedResource))->toBeTrue();
});

test('admins can see and edit all suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $adminUser = User::factory()->create(['role' => 'admin']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $user->id]);

    expect($adminUser->can('view', $suggestedResource))->toBeTrue();
    expect($adminUser->can('update', $suggestedResource))->toBeTrue();
});

test('editors can see and edit all suggested resources', function () {
    $user = User::factory()->create(['role' => 'user']);
    $editorUser = User::factory()->create(['role' => 'editor']);
    $suggestedResource = SuggestedResource::factory()->create(['user_id' => $user->id]);

    expect($editorUser->can('view', $suggestedResource))->toBeTrue();
    expect($editorUser->can('update', $suggestedResource))->toBeTrue();
});
