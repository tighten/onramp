<?php

use App\Models\Resource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('newly created resources display new tag', function () {
    $resource = Resource::factory()->create();
    $this->assertTrue($resource->is_new);
});

test('resources with a life span of exactly two weeks display new tag', function () {
    $resource = Resource::factory()->create(['created_at' => now()->subDays(14)]);
    $this->assertTrue($resource->is_new);
});

test('resources with a life span greater than two weeks dont display new tag', function () {
    $resource = Resource::factory()->create(['created_at' => now()->subDays(15)]);
    $this->assertFalse($resource->is_new);
});
