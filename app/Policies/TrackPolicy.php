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
     *
     * @return mixed
     */
    public function viewAny(User $user): bool
    {
        return $user->isAtLeastEditor();
    }

    /**
     * Determine whether the user can view the module.
     *
     * @return mixed
     */
    public function view(User $user, Track $track): bool
    {
        return $user->isAtLeastEditor();
    }

    /**
     * Determine whether the user can create modules.
     *
     * @return mixed
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the module.
     *
     * @return mixed
     */
    public function update(User $user, Track $track): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the module.
     *
     * @return mixed
     */
    public function delete(User $user, Track $track): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the module.
     *
     * @return mixed
     */
    public function restore(User $user, Track $track): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the module.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Track $track): bool
    {
        //
    }
}
