<?php

use Database\Seeders\ContentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('content seeder runs', function () {
    $this->markTestSkipped();
    $this->seed(ContentSeeder::class);
    $this->assertTrue(true);
});

test('old install seeder runs after fresh', function () {
    $this->markTestIncomplete('Need to figure out how to run a test when the seeder asks for user input');
    $this->seed(FreshInstallSeeder::class);
    $this->seed(ReplaceOnlyContentFromSeedersSeeder::class);
    $this->assertTrue(true);
});
