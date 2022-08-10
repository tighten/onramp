<?php

namespace App\Handlers\Events;

use App\Notifications\SendExpiredResources;
use App\Notifications\SuggestedResourceSubmitted;
use App\Notifications\UserSignedUp;
use App\TightenSlack;
use Illuminate\Support\Facades\App;

class SlackSubscriber
{
    protected $slack;

    public function __construct(TightenSlack $slack)
    {
        $this->slack = $slack;
    }

    public function subscribe($events)
    {
        if (empty(config('services.slack.notification_endpoint')) || App::environment('testing')) {
            return;
        }

        $events->listen('new-signup', [$this, 'onNewSignup']);

        $events->listen('new-suggested-resource', [$this, 'onNewSuggestedResource']);

        $events->listen('send-expired-resources', [$this, 'onExpiredResources']);
    }

    public function onNewSignup($user, $request)
    {
        $this->slack->notify(new UserSignedUp($user, $request->getClientIp()));
    }

    public function onNewSuggestedResource($suggestedResource)
    {
        $this->slack->notify(new SuggestedResourceSubmitted($suggestedResource));
    }

    public function onExpiredResources($expiredResources)
    {
        $this->slack->notify(new SendExpiredResources($expiredResources));
    }
}
