<?php

namespace Tests\Feature;

use App\Resource;
use App\Term;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GlossaryRelationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function glossary_page_shows_related_resources()
    {
        $currentLocale = 'en';
        $resource = Resource::factory()->create(['language' => $currentLocale]);
        $otherResource = Resource::factory()->create(['language' => $currentLocale]);
        $term = Term::factory()->create();

        $term->resources()->save($resource);

        $this->assertContains($resource->id, $term->fresh()->resources()->pluck('resources.id'));

        $response = $this->get("/{$currentLocale}/glossary");
        $response->assertSee($resource->name);
        $response->assertDontSee($otherResource->name);
    }

    /** @test */
    function glossary_page_hides_related_resources_not_in_the_current_locale()
    {
        $currentLocale = 'en';
        $englishResource = Resource::factory()->create(['language' => $currentLocale]);
        $spanishResource = Resource::factory()->create(['language' => 'es']);
        $term = Term::factory()->create();

        $term->resources()->saveMany([$englishResource, $spanishResource]);

        $this->assertContains($englishResource->id, $term->fresh()->resources()->pluck('resources.id'));
        $this->assertContains($spanishResource->id, $term->fresh()->resources()->pluck('resources.id'));
        $this->assertNotContains($spanishResource->id, $term->fresh()->resourcesForCurrentSession()->pluck('resources.id'));

        $response = $this->get("/{$currentLocale}/glossary");
        $response->assertSee($englishResource->name);
        $response->assertDontSee($spanishResource->name);
    }
}
