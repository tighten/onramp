<?php

namespace App\Policies;

use App\Models\SuggestedResource;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuggestedResourcePolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        return $user->isAtLeastEditor() ?: null;
    }

    /**
     * Determine whether the user can view any Suggested resources.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the Suggested resource.
     */
    public function view(User $user, SuggestedResource $suggestedResource): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create Suggested resources.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the Suggested resource.
     */
    public function update(User $user, SuggestedResource $suggestedResource): bool
    {
        return $user->id === $suggestedResource->user_id || $user->isAtLeastEditor();
    }

    /**
     * Determine whether the user can delete the Suggested resource.
     */
    public function delete(User $user, SuggestedResource $suggestedResource): bool
    {
        return $user->id === $suggestedResource->user_id;
    }

    /**
     * Determine whether the user can restore the Suggested resource.
     */
    public function restore(User $user, SuggestedResource $suggestedResource): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the Suggested resource.
     */
    public function forceDelete(User $user, SuggestedResource $suggestedResource): bool
    {
        //
    }
}
