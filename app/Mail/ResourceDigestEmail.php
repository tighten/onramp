<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResourceDigestEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public $resources, public $user, public $unsubscribeUrl) {}

    public function envelope()
    {
        return new Envelope(
            subject: 'New Onramp Resources!',
            from: 'no-reply@onramp.com',
        );
    }

    public function content()
    {
        return new Content(
            markdown: 'emails.resource-digest',
            with: [
                'resources' => $this->resources,
                'user' => $this->user,
                'unsubscribeUrl' => $this->unsubscribeUrl,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
