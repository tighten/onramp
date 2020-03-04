<?php

namespace Tests\Feature;

use App\SuggestedResource;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
