<?php

namespace Tests\Feature;

use App\Models\Module;
use App\Models\SuggestedResource;
use App\Models\User;
use App\Nova\Actions\ApproveSuggestedResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Nova\Fields\ActionFields;
use Tests\NovaTestCase;

class SuggestedResourcesTest extends NovaTestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function rejected_reason_field_shows_when_a_resource_has_been_rejected(): void
    {
        $user = User::factory()->create([
            'track_id' => $this->faker->randomDigit(),
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
    }

    /** @test */
    public function rejected_reason_field_does_not_show_when_a_resource_has_not_been_rejected(): void
    {
        $user = User::factory()->create([
            'track_id' => $this->faker->randomDigit(),
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
    }

    /** @test */
    public function a_new_resource_is_created_after_a_suggested_resource_is_approved(): void
    {
        $module = Module::factory()->create();

        $suggestedResource = SuggestedResource::factory()->create([
            'user_id' => $this->faker->randomDigit(),
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
