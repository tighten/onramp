<?php

use App\Models\Resource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


test('newly created resources display new tag', function () {
    $resource = Resource::factory()->create();
    expect($resource->is_new)->toBeTrue();
});

test('resources with a life span of exactly two weeks display new tag', function () {
    $resource = Resource::factory()->create(['created_at' => now()->subDays(14)]);
    expect($resource->is_new)->toBeTrue();
});

test('resources with a life span greater than two weeks dont display new tag', function () {
    $resource = Resource::factory()->create(['created_at' => now()->subDays(15)]);
    expect($resource->is_new)->toBeFalse();
});
