<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Slack\BlockKit\Blocks\ContextBlock;
use Illuminate\Notifications\Slack\BlockKit\Blocks\SectionBlock;
use Illuminate\Notifications\Slack\SlackMessage;

class SendExpiredResources extends Notification
{
    public const REPORT_LIMIT = 9;

    public function __construct(protected $expiredResources)
    {
        //
    }

    public function via($notifiable): array
    {
        return ['slack'];
    }

    public function toSlack($notifiable): SlackMessage
    {
        $msg = (new SlackMessage)
            ->text(sprintf('Here is your expired resources report: %s', url('/nova')));

        $this->expiredResources->take(self::REPORT_LIMIT)->each(function ($resource) use ($msg) {
            $status = $resource->isExpired() ? ':red_circle:' : ':large_yellow_circle:';

            $msg->sectionBlock(function (SectionBlock $block) use ($resource, $status) {
                $block->text(sprintf(
                    '%s *<%s|%s>*: *%s*',
                    $status,
                    $resource->url,
                    ucwords($resource->name),
                    $resource->days_til_expired,
                ));
            })->contextBlock(function (ContextBlock $block) use ($resource) {
                $block->text(sprintf(
                    "Used in %s modules\t\t\tExpiration Date: %s",
                    $resource->modules->count(),
                    $resource->expiration_date->format('m/d/Y'),
                ));
            })->dividerBlock();
        });

        if ($remainingResources = $this->getRemainingResourcesCount()) {
            $msg->sectionBlock(function (SectionBlock $block) use ($remainingResources) {
                $block->text(sprintf(
                    '*<%s|%s>*',
                    url('/nova'),
                    "+ {$remainingResources} more expired or expiring resources",
                ));
            });
        }

        return $msg;
    }

    private function getRemainingResourcesCount(): int
    {
        if (count($this->expiredResources) < self::REPORT_LIMIT) {
            return 0;
        }

        return count($this->expiredResources) - self::REPORT_LIMIT;
    }
}
