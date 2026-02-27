<?php

use App\Models\Completion;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(Tests\TestCase::class);
uses(RefreshDatabase::class);

it('completes a passed in resource', function () {
    $this->be(User::factory()->create());
    $resource = Resource::factory()->create();

    $response = $this->post(route_wlocale('user.completions.store'), [
        'completable_type' => $resource->getMorphClass(),
        'completable_id' => $resource->id,
    ]);

    expect(Completion::count())->toEqual(1);
});

it('deletes a passed in resources completion', function () {
    $this->be($user = User::factory()->create());
    $resource = Resource::factory()->create();

    Completion::create([
        'completable_type' => $resource->getMorphClass(),
        'completable_id' => $resource->id,
        'user_id' => $user->id,
    ]);

    expect(Completion::count())->toEqual(1);

    $response = $this->delete(route_wlocale('user.completions.destroy'), [
        'completable_type' => $resource->getMorphClass(),
        'completable_id' => $resource->id,
    ]);

    expect(Completion::count())->toEqual(0);
});

test('non authenticated users cannot delete completions', function () {
    $user = User::factory()->create();
    $resource = Resource::factory()->create();

    Completion::create([
        'completable_type' => $resource->getMorphClass(),
        'completable_id' => $resource->id,
        'user_id' => $user->id,
    ]);

    $this->delete(route_wlocale('user.completions.destroy'), [
        'completable_type' => $resource->getMorphClass(),
        'completable_id' => $resource->id,
    ]);

    expect(Completion::count())->toEqual(1);
});
