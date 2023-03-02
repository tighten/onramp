<?php

namespace Tests\Feature;

use App\Models\Module;
use App\Models\Resource;
use App\Models\Term;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GlossaryRelationsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function glossary_page_shows_related_resources(): void
    {
        $currentLocale = 'en';
        $module = Module::factory()->create();
        $resource = Resource::factory()->create(['language' => $currentLocale]);
        $otherResource = Resource::factory()->create(['language' => $currentLocale]);
        $term = Term::factory()->create();

        $module->resources()->save($resource);
        $term->resources()->save($resource);

        $this->assertContains($resource->id, $term->fresh()->resources->pluck('id'));

        $response = $this->get("/{$currentLocale}/glossary");
        $response->assertSee($resource->name);
        $response->assertDontSee($otherResource->name);
    }

    /** @test */
    public function glossary_page_hides_related_resources_not_in_the_current_locale(): void
    {
        $currentLocale = 'en';
        $module = Module::factory()->create();
        $englishResource = Resource::factory()->create(['language' => $currentLocale]);
        $spanishResource = Resource::factory()->create(['language' => 'es']);
        $term = Term::factory()->create();

        $module->resources()->saveMany([$englishResource, $spanishResource]);
        $term->resources()->saveMany([$englishResource, $spanishResource]);

        $this->assertContains($englishResource->id, $term->fresh()->resources->pluck('id'));
        $this->assertContains($spanishResource->id, $term->fresh()->resources->pluck('id'));
        $this->assertNotContains($spanishResource->id, $term->fresh()->resourcesForCurrentSession()->pluck('resources.id'));

        $response = $this->get("/{$currentLocale}/glossary");
        $response->assertSee($englishResource->name);
        $response->assertDontSee($spanishResource->name);
    }
}
