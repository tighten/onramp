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
        return ($user->isAdmin() ?: null);
    }

    /**
     * Determine whether the user can view any modules.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAtLeastEditor();
    }

    /**
     * Determine whether the user can view the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return mixed
     */
    public function view(User $user, Track $track)
    {
        return $user->isAtLeastEditor();
    }

    /**
     * Determine whether the user can create modules.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return mixed
     */
    public function update(User $user, Track $track)
    {
        //
    }

    /**
     * Determine whether the user can delete the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return mixed
     */
    public function delete(User $user, Track $track)
    {
        //
    }

    /**
     * Determine whether the user can restore the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return mixed
     */
    public function restore(User $user, Track $track)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Track  $track
     * @return mixed
     */
    public function forceDelete(User $user, Track $track)
    {
        //
    }
}
