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
     * Determine whether the user can view any modules.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAtLeastEditor();
    }

    /**
     * Determine whether the user can view the module.
     */
    public function view(User $user, Track $track): bool
    {
        return $user->isAtLeastEditor();
    }

    /**
     * Determine whether the user can create modules.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the module.
     */
    public function update(User $user, Track $track): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the module.
     */
    public function delete(User $user, Track $track): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the module.
     */
    public function restore(User $user, Track $track): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the module.
     */
    public function forceDelete(User $user, Track $track): bool
    {
        //
    }
}
