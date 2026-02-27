<?php

use App\Models\Completion;
use App\Models\Module;
use App\Models\Resource;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use TypeError;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('user can complete a resource', function () {
    $user = User::factory()->create();
    $resource = Resource::factory()->create();

    $user->complete($resource);

    $this->assertEquals(1, Completion::count());
});

test('user can undo a resource completion', function () {
    $user = User::factory()->create();
    $resource = Resource::factory()->create();

    $user->complete($resource);
    $user->undoComplete($resource);

    $this->assertEquals(0, Completion::count());
});

test('user can complete a module', function () {
    $user = User::factory()->create();
    $module = Module::factory()->create();

    $user->complete($module);

    $this->assertEquals(1, Completion::count());
});

test('user can undo a module completion', function () {
    $user = User::factory()->create();
    $module = Module::factory()->create();

    $user->complete($module);
    $user->undoComplete($module);

    $this->assertEquals(0, Completion::count());
});

test('user can complete a skill', function () {
    $user = User::factory()->create();
    $skill = Skill::factory()->create();

    $user->complete($skill);

    $this->assertEquals(1, Completion::count());
});

test('user can undo a skill completion', function () {
    $user = User::factory()->create();
    $skill = Skill::factory()->create();

    $user->complete($skill);
    $user->undoComplete($skill);

    $this->assertEquals(0, Completion::count());
});

test('user cannot complete another user', function () {
    $this->expectException(TypeError::class);

    $user = User::factory()->create();
    $otherUser = User::factory()->create();

    $user->complete($otherUser);

    $this->assertEquals(0, Completion::count());
});

test('user can list module completions', function () {
    $user = User::factory()->create();
    $module = Module::factory()->create();
    $otherModule = Module::factory()->create();
    $user->complete($otherModule);

    $this->assertContains($otherModule->id, $user->moduleCompletions->pluck('completable_id'));
    $this->assertNotContains($module->id, $user->moduleCompletions->pluck('completable_id'));
});

test('user can list resource completions', function () {
    $user = User::factory()->create();
    $resource = Resource::factory()->create();
    $otherResource = Resource::factory()->create();
    $user->complete($otherResource);

    $this->assertContains($otherResource->id, $user->resourceCompletions->pluck('completable_id'));
    $this->assertNotContains($resource->id, $user->resourceCompletions->pluck('completable_id'));
});

test('user can list skill completions', function () {
    $user = User::factory()->create();
    $skill = Skill::factory()->create();
    $otherSkill = Skill::factory()->create();
    $user->complete($otherSkill);

    $this->assertContains($otherSkill->id, $user->skillCompletions->pluck('completable_id'));
    $this->assertNotContains($skill->id, $user->skillCompletions->pluck('completable_id'));
});
