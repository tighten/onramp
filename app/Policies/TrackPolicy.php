<?php

namespace App\Policies;

use App\Models\Track;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrackPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        return $user->isAdmin() ?: null;
    }

    public function viewAny(User $user): bool
    {
        return $user->isAtLeastEditor();
    }

    public function view(User $user, Track $track): bool
    {
        return $user->isAtLeastEditor();
    }

    public function update(User $user, Track $track): bool
    {
        return false;
    }

    public function delete(User $user, Track $track): bool
    {
        return false;
    }

    public function restore(User $user, Track $track): bool
    {
        return false;
    }

    public function forceDelete(User $user, Track $track): bool
    {
        return false;
    }
}
