<?php

use App\Models\Module;
use App\Models\SuggestedResource;
use App\Models\User;
use App\Nova\Actions\ApproveSuggestedResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Nova\Fields\ActionFields;
use Tests\NovaTestCase;

uses(Tests\NovaTestCase::class);
uses(RefreshDatabase::class);
uses(WithFaker::class);

test('rejected reason field shows when a resource has been rejected', function () {
    $user = User::factory()->create([
        'track_id' => \App\Models\Track::factory(),
    ]);

    $suggestedResource = SuggestedResource::factory()->create([
        'user_id' => $user->id,
        'status' => 'rejected',
        'rejected_reason' => $this->faker->sentence(),
    ]);

    $this->actingAs($user);

    $response = $this->json('GET', '/nova-api/suggested-resources/' . $suggestedResource->id);

    $response->assertJsonFragment([
        'attribute' => 'rejected_reason',
    ]);
});

test('rejected reason field does not show when a resource has not been rejected', function () {
    $user = User::factory()->create([
        'track_id' => \App\Models\Track::factory(),
    ]);

    $suggestedResource = SuggestedResource::factory()->create([
        'user_id' => $user->id,
        'status' => 'approved',
        'rejected_reason' => $this->faker->sentence(),
    ]);

    $this->actingAs($user);

    $response = $this->json('GET', '/nova-api/suggested-resources/' . $suggestedResource->id);

    $response->assertJsonMissing([
        'attribute' => 'rejected_reason',
    ]);
});

test('a new resource is created after a suggested resource is approved', function () {
    $module = Module::factory()->create();

    $suggestedResource = SuggestedResource::factory()->create([
        'user_id' => User::factory(),
        'type' => 'article',
        'module_id' => $module->id,
    ]);

    $this->assertDatabaseMissing('resources', [
        'name' => $suggestedResource->name,
    ]);

    (new ApproveSuggestedResource)->handle(new ActionFields(collect([]), collect([])), collect([$suggestedResource]));

    $this->assertDatabaseHas('resources', [
        'name' => $suggestedResource->name,
    ]);
});
