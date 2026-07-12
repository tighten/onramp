<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\NovaTestCase;

uses(NovaTestCase::class);
uses(RefreshDatabase::class);

test('guest json requests to nova api receive 401 instead of a url generation error', function () {
    $this->getJson('/nova-api/users')->assertUnauthorized();
});

test('guest non-json requests to nova api do not throw a url generation error', function () {
    // Regression: the framework's default guest redirect calls route('login')
    // without the required {locale} parameter, causing a 500 in production.
    $this->get('/nova-api/users')->assertUnauthorized();
});

test('guests requesting nova pages are redirected to the nova login page', function () {
    $this->get('/nova')->assertRedirect('/nova/login');
});
