<?php

namespace Tests\Unit;

use App\Mail\ResourceDigestEmail;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResourceDigestEmailTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function resource_digest_email_content(): void
    {
        $resources = Resource::factory()->count(3)->make();
        $user = User::factory()->make(['locale' => 'en']);
        $unsubscribeUrl = 'http://example.com/unsubscribe';

        $mailable = new ResourceDigestEmail($resources, $user, $unsubscribeUrl);

        $this->assertEquals('New Onramp Resources!', $mailable->envelope()->subject);

        $renderedMailable = $mailable->render();

        $this->assertStringContainsString($resources[0]->name, $renderedMailable);
        $this->assertStringContainsString($unsubscribeUrl, $renderedMailable);
    }
}
