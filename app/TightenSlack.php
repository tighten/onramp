<?php

namespace App;

use Illuminate\Notifications\Notifiable as NotifiableTrait;

class TightenSlack
{
    use NotifiableTrait;

    /**
     * @return string|null
     */
    public function routeNotificationForSlack(): ?string
    {
        return config('services.slack.notification_endpoint');
    }
}
