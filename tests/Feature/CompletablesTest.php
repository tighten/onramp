<?php

use App\Models\Completion;
use App\Models\Module;
use App\Models\Resource;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('user can complete a resource', function () {
    $user = User::factory()->create();
    $resource = Resource::factory()->create();

    $user->complete($resource);

    expect(Completion::count())->toEqual(1);
});

test('user can undo a resource completion', function () {
    $user = User::factory()->create();
    $resource = Resource::factory()->create();

    $user->complete($resource);
    $user->undoComplete($resource);

    expect(Completion::count())->toEqual(0);
});

test('user can complete a module', function () {
    $user = User::factory()->create();
    $module = Module::factory()->create();

    $user->complete($module);

    expect(Completion::count())->toEqual(1);
});

test('user can undo a module completion', function () {
    $user = User::factory()->create();
    $module = Module::factory()->create();

    $user->complete($module);
    $user->undoComplete($module);

    expect(Completion::count())->toEqual(0);
});

test('user can complete a skill', function () {
    $user = User::factory()->create();
    $skill = Skill::factory()->create();

    $user->complete($skill);

    expect(Completion::count())->toEqual(1);
});

test('user can undo a skill completion', function () {
    $user = User::factory()->create();
    $skill = Skill::factory()->create();

    $user->complete($skill);
    $user->undoComplete($skill);

    expect(Completion::count())->toEqual(0);
});

test('user cannot complete another user', function () {
    $this->expectException(TypeError::class);

    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    $user->complete($otherUser);

    expect(Completion::count())->toEqual(0);
});

test('user can list module completions', function () {
    $user = User::factory()->create();
    $module = Module::factory()->create();
    $otherModule = Module::factory()->create();
    $user->complete($otherModule);

    expect($user->moduleCompletions->pluck('completable_id'))->toContain($otherModule->id);
    $this->assertNotContains($module->id, $user->moduleCompletions->pluck('completable_id'));
});

test('user can list resource completions', function () {
    $user = User::factory()->create();
    $resource = Resource::factory()->create();
    $otherResource = Resource::factory()->create();
    $user->complete($otherResource);

    expect($user->resourceCompletions->pluck('completable_id'))->toContain($otherResource->id);
    $this->assertNotContains($resource->id, $user->resourceCompletions->pluck('completable_id'));
});

test('user can list skill completions', function () {
    $user = User::factory()->create();
    $skill = Skill::factory()->create();
    $otherSkill = Skill::factory()->create();
    $user->complete($otherSkill);

    expect($user->skillCompletions->pluck('completable_id'))->toContain($otherSkill->id);
    $this->assertNotContains($skill->id, $user->skillCompletions->pluck('completable_id'));
});
