<?php

namespace Tests\Feature;

use App\Models\Resource;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class ResourceExpirationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function resources_can_be_expired_or_expiring()
    {
        $resourceA = Resource::factory()->expired()->createQuietly();
        $resourceB = Resource::factory()->expiring()->createQuietly();

        $this->assertTrue($resourceA->isExpired());
        $this->assertTrue($resourceB->isExpiring());
    }

    /** @test */
    public function can_scope_expiring_and_expired_resources()
    {
        Resource::factory()->expired()->createQuietly();
        Resource::factory()->expiring()->createQuietly();

        $this->assertCount(2, Resource::expired()
            ->orWhere(function ($query) {
                $query->expiring();
            })->get());
    }

    /** @test */
    public function event_is_dispatched_for_expired_content_notification()
    {
        Event::fake();

        Resource::factory()
            ->count(3)
            ->expired()
            ->createQuietly();

        Artisan::call('resource:expired -N');

        Event::assertDispatched('send-expired-resources');
    }

    /** @test */
    public function event_is_dispatched_for_expiring_content_notification()
    {
        Event::fake();

        Resource::factory()
            ->count(3)
            ->expiring()
            ->createQuietly();

        Artisan::call('resource:expired -N');

        Event::assertDispatched('send-expired-resources');
    }

    /** @test */
    public function expired_resources_have_an_expiration_label()
    {
        $resourceA = Resource::factory()->expired()->createQuietly();
        $resourceB = Resource::factory()->expiring()->createQuietly();

        $this->assertSame('1 day ago', $resourceA->days_til_expired);
        $this->assertSame('2 weeks from now', $resourceB->days_til_expired);
    }

    /** @test */
    public function a_six_month_expiration_date_is_set_when_a_resource_can_expire()
    {
        Carbon::setTestNow($date = Carbon::createFromDate(today()));

        $resource = Resource::factory()->create([
            'can_expire' => true,
        ]);

        $this->assertTrue(
            $date->addMonths(config('resources.default_expiration_length'))->eq($resource->expiration_date)
        );
    }

    /** @test */
    public function a_six_month_expiration_date_is_not_set_when_a_resource_cant_expire()
    {
        $resource = Resource::factory()->create([
            'can_expire' => false,
        ]);

        $this->assertNull($resource->expiration_date);
    }

    /** @test */
    public function a_six_month_expiration_date_is_set_when_a_resource_is_updated_to_expire()
    {
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
    }

    /** @test */
    public function expiration_date_is_unset_when_a_resource_is_updated_to_not_expire()
    {
        Carbon::setTestNow($date = Carbon::createFromDate(today()));

        $resource = Resource::factory()->create([
            'can_expire' => true,
        ]);

        $resource->can_expire = false;
        $resource->save();

        $this->assertNull($resource->expiration_date);
    }
}
