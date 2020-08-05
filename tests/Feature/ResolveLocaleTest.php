<?php

namespace Tests\Feature;

use App\Localization\ResolveLocale;
use Exception;
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

        $resolver = new ResolveLocale($requestMock, $this->app);

        $this->assertEquals('es', $resolver());
    }

    /** @test */
    function it_errors_for_invalid_locales()
    {
        $this->expectException(Exception::class);
        $requestMock = Mockery::mock(Request::class);
        $requestMock->shouldReceive('segments')
            ->withNoArgs()
            ->andReturn(['notalocale', 'learn']); // Mock onramp.dev/notalocale/learn

        $resolver = new ResolveLocale($requestMock, $this->app);
        $resolver();
    }
}
