<?php

namespace App\Mail;

use App\SuggestedResource;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuggestedResourceRejectionEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $suggestedResource;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SuggestedResource $suggestedResource, User $user)
    {
        $this->suggestedResource = $suggestedResource;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
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
