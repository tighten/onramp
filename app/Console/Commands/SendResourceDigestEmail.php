<?php

namespace App\Console\Commands;

use App\Mail\ResourceDigestEmail;
use App\Models\Resource;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendResourceDigestEmail extends Command
{
    protected $signature = 'mail:send-resource-digest-email';
    protected $description = 'Send the monthly resource digest email';

    public function handle()
    {
        $resources = Resource::where('created_at', '>=', Carbon::now()->subDays(30))->get();

        if ($resources->isEmpty()) {
            $this->info('No resources created in the last 30 days. Email not sent.');

            return;
        }

        User::where('is_subscriber', true)->chunk(100, function ($subscribedUsers) use ($resources) {
            foreach ($subscribedUsers as $user) {
                try {
                    $locale = $user->locale ?? 'en';
                    $unsubscribeUrl = route('unsubscribe', ['token' => $user->unsubscribe_token, 'locale' => $locale]);

                    Mail::to($user->email)->queue(new ResourceDigestEmail($resources, $user, $unsubscribeUrl));
                } catch (Exception $e) {
                    Log::error('Failed to send email to ' . $user->email . ': ' . $e->getMessage());
                }
            }
        });

        $this->info('Monthly resource digest sent successfully to all subscribed users.');
    }
}
