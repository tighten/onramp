<?php

use App\Localization\ResolveLocale;
use Illuminate\Http\Request;
use Tests\TestCase;

uses(Tests\TestCase::class);

it('resolves locale from path', function () {
    $requestMock = Mockery::mock(Request::class);
    $requestMock->shouldReceive('segments')
        ->withNoArgs()
        ->andReturn(['es', 'learn']); // Mock onramp.dev/es/learn

    $resolver = new ResolveLocale($requestMock, app());

    expect($resolver())->toEqual('es');
});

it('errors for invalid locales', function () {
    $this->expectException(Exception::class);
    $requestMock = Mockery::mock(Request::class);
    $requestMock->shouldReceive('segments')
        ->withNoArgs()
        ->andReturn(['notalocale', 'learn']); // Mock onramp.dev/notalocale/learn

    $resolver = new ResolveLocale($requestMock, app());
    $resolver();
});
