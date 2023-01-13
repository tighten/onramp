<?php

namespace Tests\Unit;

use App\Models\Resource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResourceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function newly_created_resources_display_new_tag()
    {
        $resource = Resource::factory()->create();
        $this->assertTrue($resource->is_new);
    }

    /** @test */
    public function resources_with_a_life_span_of_exactly_two_weeks_display_new_tag()
    {
        $resource = Resource::factory()->create(['created_at' => now()->subDays(14)]);
        $this->assertTrue($resource->is_new);
    }

    /** @test */
    public function resources_with_a_life_span_greater_than_two_weeks_dont_display_new_tag()
    {
        $resource = Resource::factory()->create(['created_at' => now()->subDays(15)]);
        $this->assertFalse($resource->is_new);
    }
}
