<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testBasicTest()
    {
        $this->seed(\DatabaseSeeder::class);
        $this->assertTrue(true);
    }
}
