<?php

namespace App\Mail;

use App\Models\SuggestedResource;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuggestedResourceRejectionEmail extends Mailable
{
    use Queueable;
    use SerializesModels;

    protected $suggestedResource;

    protected $user;

    public function __construct(SuggestedResource $suggestedResource, User $user)
    {
        $this->suggestedResource = $suggestedResource;
        $this->user = $user;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this->subject('Your Resource Has Been Reviewed')
            ->from(config('mail.from.address'))
            ->markdown('emails.rejected-resource')
            ->with([
                'resource' => $this->suggestedResource,
                'user' => $this->user,
            ]);
    }
}
