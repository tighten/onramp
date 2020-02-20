<?php

namespace App\Policies;

use App\SuggestedResource;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuggestedResourcePolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        return ($user->isAtLeastEditor() ?: null);
    }

    /**
     * Determine whether the user can view any Suggested resources.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the Suggested resource.
     *
     * @param  \App\User  $user
     * @param  \App\SuggestedResource  $suggestedResource
     * @return mixed
     */
    public function view(User $user, SuggestedResource $suggestedResource)
    {
        return true;
    }

    /**
     * Determine whether the user can create Suggested resources.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the Suggested resource.
     *
     * @param  \App\User  $user
     * @param  \App\SuggestedResource  $suggestedResource
     * @return mixed
     */
    public function update(User $user, SuggestedResource $suggestedResource)
    {
        return $user->id === $suggestedResource->user_id;
    }

    /**
     * Determine whether the user can delete the Suggested resource.
     *
     * @param  \App\User  $user
     * @param  \App\SuggestedResource  $suggestedResource
     * @return mixed
     */
    public function delete(User $user, SuggestedResource $suggestedResource)
    {
        return $user->id === $suggestedResource->user_id;
    }

    /**
     * Determine whether the user can restore the Suggested resource.
     *
     * @param  \App\User  $user
     * @param  \App\SuggestedResource  $suggestedResource
     * @return mixed
     */
    public function restore(User $user, SuggestedResource $suggestedResource)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the Suggested resource.
     *
     * @param  \App\User  $user
     * @param  \App\SuggestedResource  $suggestedResource
     * @return mixed
     */
    public function forceDelete(User $user, SuggestedResource $suggestedResource)
    {
        //
    }
}
