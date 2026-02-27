<?php

use Database\Seeders\ContentSeeder;

test('content seeder runs', function () {
    $this->markTestSkipped();
    $this->seed(ContentSeeder::class);
    expect(true)->toBeTrue();
});

test('old install seeder runs after fresh', function () {
    $this->markTestIncomplete('Need to figure out how to run a test when the seeder asks for user input');
    $this->seed(FreshInstallSeeder::class);
    $this->seed(ReplaceOnlyContentFromSeedersSeeder::class);
    expect(true)->toBeTrue();
});
