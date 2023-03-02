<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackAttachment;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class SuggestedResourceSubmitted extends Notification
{
    use Queueable;

    protected $suggestedResource;

    protected $fields;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($suggestedResource)
    {
        $this->suggestedResource = $suggestedResource;

        $this->fields = [
            'Name' => $this->suggestedResource->name,
            'Type' => ucwords($this->suggestedResource->type),
            'URL' => $this->suggestedResource->url,
        ];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->from('Onramp', ':onramp:')
            ->content('New resource suggested!')
            ->attachment(function (SlackAttachment $attachment) {
                $attachment
                    ->title('View in Nova', url('/nova'))
                    ->fields($this->fields)
                    ->timestamp(Carbon::now());
            });
    }
}
