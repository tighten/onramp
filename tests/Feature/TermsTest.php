<?php

namespace Tests\Feature;

use App\Term;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TermsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function glossary_terms_can_be_multi_lingual()
    {
        $term = factory(Term::class)->create();

        $this->get('/en/glossary')
            ->assertSee($term->name);

        $this->get('/es/glossary')
            ->assertSee($term->getTranslation('name', 'es'))
            ->assertSee($term->getEnglishName());
    }

    /** @test */
    public function a_term_that_only_exists_in_english_shows_it_in_english_on_other_locales()
    {
        $term = factory(Term::class)->create([
            'name' => 'Routes',
            'description' => 'This should be some information about the routes'
        ]);

        $this->get('/es/glossary')
            ->assertSee($term->name)
            ->assertSee($term->description);
    }

    /** @test */
    public function a_term_without_specified_language_is_stored_with_the_default_locale()
    {
        $collections = [
            'name' => 'Collections',
            'description' => 'A collection is super powered arrays in an object oriented way'
        ];

        $term = Term::create($collections);
        $this->assertEquals($collections['name'], $term->name);
        $this->assertEquals($collections['name'], $term->getEnglishName());
    }
}
