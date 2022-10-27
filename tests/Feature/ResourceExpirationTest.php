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
        $resourceA = Resource::factory()->expired()->create();
        $resourceB = Resource::factory()->expiring()->create();

        $this->assertTrue($resourceA->isExpired());
        $this->assertTrue($resourceB->isExpiring());
    }

    /** @test */
    public function can_scope_expiring_and_expired_resources()
    {
        Resource::factory()->expired()->create();
        Resource::factory()->expiring()->create();

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
            ->create();

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
            ->create();

        Artisan::call('resource:expired -N');

        Event::assertDispatched('send-expired-resources');
    }

    /** @test */
    public function expired_resources_have_an_expiration_label()
    {
        $resourceA = Resource::factory()->expired()->create();
        $resourceB = Resource::factory()->expiring()->create();

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

        $this->assertTrue($date->addMonths(6)->eq($resource->expiration_date));
    }

    /** @test */
    public function a_six_month_expiration_date_is_not_set_when_a_resource_cant_expire()
    {
        $resource = Resource::factory()->create([
            'can_expire' => false,
        ]);

        $this->assertNull($resource->expiration_date);
    }
}
