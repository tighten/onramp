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
        $resource = factory(Resource::class)->create();
        $otherResource = factory(Resource::class)->create();
        $term = factory(Term::class)->create();

        $term->resources()->save($resource);

        $this->assertContains($resource->id, $term->fresh()->resources()->pluck('resources.id'));

        $response = $this->get('/en/glossary');
        $response->assertSee($resource->name);
        $response->assertDontSee($otherResource->name);
    }
}
