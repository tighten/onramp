<?php

namespace Tests\Unit;

use App\Console\Commands\SendResourceDigestEmail;
use App\Mail\ResourceDigestEmail;
use App\Models\Resource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Tests\TestCase;

class SendResourceDigestEmailCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_send_resource_digest_email()
    {
        Mail::fake();

        $recentDate = Carbon::now()->subDays(15);
        Resource::factory()->count(5)->create(['created_at' => $recentDate, 'updated_at' => $recentDate]);

        User::factory()->count(10)->create([
            'is_subscriber' => true,
            'unsubscribe_token' => fn () => Str::random(60),
        ]);

        User::factory()->count(5)->create([
            'is_subscriber' => false,
            'unsubscribe_token' => null,
        ]);

        $this->artisan('mail:send-resource-digest-email')
            ->expectsOutput('Monthly resource digest sent successfully to all subscribed users.')
            ->assertExitCode(0);

        Mail::assertQueued(ResourceDigestEmail::class, 10);
    }

    /** @test */
    public function it_will_not_send_email_if_no_resources()
    {
        Mail::fake();

        Resource::query()->delete();

        $this->artisan(SendResourceDigestEmail::class)
            ->expectsOutput('No resources created in the last 30 days. Email not sent.')
            ->assertExitCode(0);

        Mail::assertNotQueued(ResourceDigestEmail::class);
    }
}
