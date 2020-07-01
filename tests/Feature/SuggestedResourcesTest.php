<?php

namespace Tests\Feature;

use App\Module;
use App\Nova\Actions\ApproveSuggestedResource;
use App\SuggestedResource;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Nova\Fields\ActionFields;
use Tests\TestCase;

class SuggestedResourcesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    function rejected_reason_field_shows_when_a_resource_has_been_rejected()
    {
        $user = factory(User::class)->create([
            'track_id' => $this->faker->randomDigit,
        ]);

        $suggestedResource = factory(SuggestedResource::class)->create([
            'user_id' => $user->id,
            'status' => 'rejected',
            'rejected_reason' => $this->faker->sentence(),
        ]);

        $this->actingAs($user);

        $response = $this->json('GET', '/nova-api/suggested-resources/' . $suggestedResource->id);

        $response->assertJsonFragment([
            'attribute' => 'rejected_reason',
        ]);
    }

    /** @test */
    function rejected_reason_field_does_not_show_when_a_resource_has_not_been_rejected()
    {
        $user = factory(User::class)->create([
            'track_id' => $this->faker->randomDigit,
        ]);

        $suggestedResource = factory(SuggestedResource::class)->create([
            'user_id' => $user->id,
            'status' => 'approved',
            'rejected_reason' => $this->faker->sentence(),
        ]);

        $this->actingAs($user);

        $response = $this->json('GET', '/nova-api/suggested-resources/' . $suggestedResource->id);

        $response->assertJsonMissing([
            'attribute' => 'rejected_reason',
        ]);
    }

    /** @test */
    function a_new_resource_is_created_after_a_suggested_resource_is_approved()
    {
        $module = factory(Module::class)->create();

        $suggestedResource = factory(SuggestedResource::class)->create([
            'user_id' => $this->faker->randomDigit,
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
    }
}
