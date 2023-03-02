<?php

namespace App\Policies;

use App\Models\Resource;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResourcePolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        return $user->isAtLeastEditor() ?: null;
    }

    /**
     * Determine whether the user can view any terms.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the term.
     *
     * @param  \App\Models\Resource  $term
     */
    public function view(User $user, Resource $resource): bool
    {
        //
    }

    /**
     * Determine whether the user can create terms.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the term.
     *
     * @param  \App\Models\Resource  $term
     */
    public function update(User $user, Resource $resource): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the term.
     *
     * @param  \App\Models\Resource  $term
     */
    public function delete(User $user, Resource $resource): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the term.
     *
     * @param  \App\Models\Resource  $term
     */
    public function restore(User $user, Resource $resource): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the term.
     *
     * @param  \App\Models\Resource  $term
     */
    public function forceDelete(User $user, Resource $resource): bool
    {
        //
    }
}
