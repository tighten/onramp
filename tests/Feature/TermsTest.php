<?php

use App\Models\Term;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('glossary page loads', function () {
    $term = Term::factory()->create();

    $response = $this->get('/en/glossary')
        ->assertSuccessful();
});

test('glossary terms can be multi lingual', function () {
    $term = Term::factory()->create();

    $response = $this->get('/en/glossary')
        ->assertSee($term->name);

    $this->get('/es/glossary')
        ->assertSee($term->getTranslation('name', 'es'))
        ->assertSee($term->getEnglishName());
});

test('a term that only exists in english shows it in english on other locales', function () {
    $term = Term::factory()->create([
        'name' => ['en' => 'Routes'],
        'description' => ['en' => 'This should be some information about the routes'],
    ]);

    $this->get('/es/glossary')
        ->assertSee($term->name)
        ->assertSee($term->description);
});
