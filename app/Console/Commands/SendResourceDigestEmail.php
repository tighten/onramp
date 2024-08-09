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
    protected $signature = 'send:send-resource-digest-email';
    protected $description = 'Send the monthly resource digest email';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $resources = Resource::where('created_at', '>=', Carbon::now()->subDays(30))->get();

        if ($resources->isEmpty()) {
            $this->info('No resources created in the last 30 days. Email not sent.');

            return;
        }

        $data = $resources->toArray();

        User::where('is_subscriber', true)->chunk(100, function ($subscribedUsers) use ($data) {
            foreach ($subscribedUsers as $user) {
                try {
                    Mail::to($user->email)->queue(new ResourceDigestEmail($data));
                } catch (Exception $e) {
                    Log::error('Failed to send email to ' . $user->email . ': ' . $e->getMessage());
                }
            }
        });

        $this->info('Monthly resource digest sent successfully to all subscribed users.');
    }
}
