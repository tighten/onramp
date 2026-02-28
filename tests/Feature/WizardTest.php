<?php

use App\Facades\Preferences;
use App\Models\Track;
use App\Models\User;
use App\OperatingSystem;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

it('loads', function () {
    $this->withoutExceptionHandling();
    $this->be(User::factory()->create());
    $response = $this->get(route('wizard.index', ['locale' => 'en']));

    $response->assertStatus(200);
});

it('can be submitted', function () {
    $this->be($user = User::factory()->create());
    $response = $this->post(route('wizard.store', ['locale' => 'en']),
        [
            'os' => OperatingSystem::MACOS,
            'track' => $track_id = Track::factory()->create()->id,
            'locale' => 'en',
        ]
    );

    $response->assertStatus(302);
    $user->refresh();
    expect($user->track_id)->toEqual($track_id);
    expect(Preferences::get('operating-system'))->toEqual(OperatingSystem::MACOS);
    expect(Preferences::get('locale'))->toEqual('en');
});
