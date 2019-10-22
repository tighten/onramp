<?php

namespace Tests\Feature;

use App\Resource;
use App\Term;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TermsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function glossary_page_loads()
    {
        $term = factory(Term::class)->create();

        $response = $this->get('/en/glossary')
            ->assertSuccessful();
    }

    /** @test */
    function glossary_terms_can_be_multi_lingual()
    {
        $term = factory(Term::class)->create();

        $response = $this->get('/en/glossary')
            ->assertSee($term->name);

        $this->get('/es/glossary')
            ->assertSee($term->getTranslation('name', 'es'))
            ->assertSee($term->getEnglishName());
    }

    /** @test */
    function a_term_that_only_exists_in_english_shows_it_in_english_on_other_locales()
    {
        $term = factory(Term::class)->create([
            'name' => ['en' => 'Routes'],
            'description' => ['en' => 'This should be some information about the routes'],
        ]);

        $this->get('/es/glossary')
            ->assertSee($term->name)
            ->assertSee($term->description);
    }

    /** @test */
    function a_term_may_be_related_to_one_or_more_resources()
    {
        $term = factory(Term::class)->create();
        $resourceIds = [
            factory(Resource::class)->create()->id,
            factory(Resource::class)->create()->id,
        ];

        $term->resources()->attach($resourceIds);
        $this->assertEquals($resourceIds, $term->fresh()->resources()->get()->pluck('id')->toArray());
    }

    /** @test */
    function a_term_may_be_related_to_other_terms()
    {
        $term = factory(Term::class)->create();
        $relatedTerms = [
            factory(Term::class)->create()->id,
            factory(Term::class)->create()->id,
        ];

        $term->relatedTerms()->attach($relatedTerms);
        $this->assertEquals($relatedTerms, $term->fresh()->relatedTerms()->get()->pluck('id')->toArray());
    }
}
