<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackAttachment;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class LaracastsMonthlyReminder extends Notification
{
    use Queueable;

    public function via($notifiable): array
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->from('Onramp', ':onramp:')
            ->attachment(function (SlackAttachment $attachment) {
                $attachment
                    ->title('Monthly reminder: Check Laracasts for new courses')
                    ->content("Take a moment to browse new content on Laracasts → https://laracasts.com")
                    ->timestamp(Carbon::now());
            });
    }
}
