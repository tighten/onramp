<?php

use App\Models\Resource;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Event;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('resources can be expired or expiring', function () {
    $resourceA = Resource::factory()->expired()->createQuietly();
    $resourceB = Resource::factory()->expiring()->createQuietly();

    expect($resourceA->isExpired())->toBeTrue();
    expect($resourceB->isExpiring())->toBeTrue();
});

test('can scope expiring and expired resources', function () {
    Resource::factory()->expired()->createQuietly();
    Resource::factory()->expiring()->createQuietly();

    $this->assertCount(2, Resource::expired()
        ->orWhere(function ($query) {
            $query->expiring();
        })->get());
});

test('event is dispatched for expired content notification', function () {
    Event::fake();

    Resource::factory()
        ->count(3)
        ->expired()
        ->createQuietly();

    Artisan::call('resource:expired -N');

    Event::assertDispatched('send-expired-resources');
});

test('event is dispatched for expiring content notification', function () {
    Event::fake();

    Resource::factory()
        ->count(3)
        ->expiring()
        ->createQuietly();

    Artisan::call('resource:expired -N');

    Event::assertDispatched('send-expired-resources');
});

test('expired resources have an expiration label', function () {
    $resourceA = Resource::factory()->expired()->createQuietly();
    $resourceB = Resource::factory()->expiring()->createQuietly();

    expect($resourceA->days_til_expired)->toBe('1 day ago');
    expect($resourceB->days_til_expired)->toBe('2 weeks from now');
});

test('a six month expiration date is set when a resource can expire', function () {
    Carbon::setTestNow($date = Carbon::createFromDate(today()));

    $resource = Resource::factory()->create([
        'can_expire' => true,
    ]);

    $this->assertTrue(
        $date->addMonths(config('resources.default_expiration_length'))->eq($resource->expiration_date)
    );
});

test('a six month expiration date is not set when a resource cant expire', function () {
    $resource = Resource::factory()->create([
        'can_expire' => false,
    ]);

    expect($resource->expiration_date)->toBeNull();
});

test('a six month expiration date is set when a resource is updated to expire', function () {
    Carbon::setTestNow($date = Carbon::createFromDate(today()));

    $resource = Resource::factory()->create([
        'can_expire' => false,
        'expiration_date' => null,
    ]);

    $resource->can_expire = true;
    $resource->save();

    $this->assertTrue(
        $date->addMonths(config('resources.default_expiration_length'))->eq($resource->expiration_date)
    );
});

test('expiration date is unset when a resource is updated to not expire', function () {
    Carbon::setTestNow($date = Carbon::createFromDate(today()));

    $resource = Resource::factory()->create([
        'can_expire' => true,
    ]);

    $resource->can_expire = false;
    $resource->save();

    expect($resource->expiration_date)->toBeNull();
});
