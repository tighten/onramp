<?php

namespace Tests\Feature;

use App\ResolveLocale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Mockery;
use Tests\TestCase;

class ResolveLocaleTest extends TestCase
{
    /** @test */
    function it_resolves_locale_from_path()
    {
        $requestMock = Mockery::mock(Request::class);
        $requestMock->shouldReceive('segments')
            ->withNoArgs()
            ->andReturn(['es', 'learn']); // Mock onramp.dev/es/learn

        $resolver = new ResolveLocale($requestMock, app());

        $this->assertEquals('es', $resolver());
    }

    /**
     * @test
     * @expectedException Exception
     */
    function it_errors_for_invalid_locales()
    {
        $requestMock = Mockery::mock(Request::class);
        $requestMock->shouldReceive('segments')
            ->withNoArgs()
            ->andReturn(['notalocale', 'learn']); // Mock onramp.dev/notalocale/learn

        $resolver = new ResolveLocale($requestMock, app());
        $resolver();
    }
}
