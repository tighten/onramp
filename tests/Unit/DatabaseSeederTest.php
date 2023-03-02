<?php

namespace Tests\Unit;

use Database\Seeders\ContentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use ReplaceOnlyContentFromSeedersSeeder;
use Tests\TestCase;

class DatabaseSeederTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function content_seeder_runs(): void
    {
        $this->markTestSkipped();
        $this->seed(ContentSeeder::class);
        $this->assertTrue(true);
    }

    /** @test */
    public function old_install_seeder_runs_after_fresh(): void
    {
        $this->markTestIncomplete('Need to figure out how to run a test when the seeder asks for user input');
        $this->seed(FreshInstallSeeder::class);
        $this->seed(ReplaceOnlyContentFromSeedersSeeder::class);
        $this->assertTrue(true);
    }
}
