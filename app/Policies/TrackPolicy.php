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

    /**
     * Determine whether the user can view any tracks.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAtLeastEditor();
    }

    /**
     * Determine whether the user can view the track.
     */
    public function view(User $user, Track $track): bool
    {
        return $user->isAtLeastEditor();
    }

    /**
     * Determine whether the user can update the track.
     */
    public function update(User $user, Track $track): bool
    {
        return false;
    }
}
