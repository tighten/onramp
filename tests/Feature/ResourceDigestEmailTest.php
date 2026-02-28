<?php

use App\Mail\ResourceDigestEmail;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

test('resource digest email content', function () {
    $resources = Resource::factory()->count(3)->make();
    $user = User::factory()->make(['locale' => 'en']);
    $unsubscribeUrl = 'http://example.com/unsubscribe';

    $mailable = new ResourceDigestEmail($resources, $user, $unsubscribeUrl);

    expect($mailable->envelope()->subject)->toEqual('New Onramp Resources!');

    $renderedMailable = $mailable->render();

    expect($renderedMailable)->toContain($resources[0]->name);
    expect($renderedMailable)->toContain($unsubscribeUrl);
});
