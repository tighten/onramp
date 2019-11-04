<?php

namespace Tests\Feature;

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
}
