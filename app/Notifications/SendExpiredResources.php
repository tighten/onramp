<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Messages\SlackAttachment;

class SendExpiredResources extends Notification
{
    use Queueable;

    public function __construct(protected $expiredResources)
    {
        //
    }

    public function via($notifiable)
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        $msg = (new SlackMessage())
                ->content('*Expired Resources Report*');

        collect($this->expiredResources)->map(function ($resource) use ($msg) {
            $msg->attachment(function (SlackAttachment $attachment) use ($resource) {
                $attachment->fields([
                    '*Name*' => $resource->name,
                    '*Days Expired*' => $resource->days_expired,
                ]);
            });
        });

        return $msg;
    }
}
