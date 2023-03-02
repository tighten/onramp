<?php

namespace Tests\Feature;

use App\Models\Term;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TermsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function glossary_page_loads(): void
    {
        $term = Term::factory()->create();

        $response = $this->get('/en/glossary')
            ->assertSuccessful();
    }

    /** @test */
    public function glossary_terms_can_be_multi_lingual(): void
    {
        $term = Term::factory()->create();

        $response = $this->get('/en/glossary')
            ->assertSee($term->name);

        $this->get('/es/glossary')
            ->assertSee($term->getTranslation('name', 'es'))
            ->assertSee($term->getEnglishName());
    }

    /** @test */
    public function a_term_that_only_exists_in_english_shows_it_in_english_on_other_locales(): void
    {
        $term = Term::factory()->create([
            'name' => ['en' => 'Routes'],
            'description' => ['en' => 'This should be some information about the routes'],
        ]);

        $this->get('/es/glossary')
            ->assertSee($term->name)
            ->assertSee($term->description);
    }
}
