<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase;

abstract class NovaTestCase extends TestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        if (! class_exists(\Laravel\Nova\NovaApplicationServiceProvider::class)) {
            $this->markTestSkipped('This test requires Laravel Nova to be successful.');
        }
    }
}
