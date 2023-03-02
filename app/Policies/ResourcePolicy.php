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
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the term.
     *
     * @param  \App\Models\Resource  $term
     * @return mixed
     */
    public function view(User $user, Resource $resource)
    {
        //
    }

    /**
     * Determine whether the user can create terms.
     *
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the term.
     *
     * @param  \App\Models\Resource  $term
     * @return mixed
     */
    public function update(User $user, Resource $resource)
    {
        //
    }

    /**
     * Determine whether the user can delete the term.
     *
     * @param  \App\Models\Resource  $term
     * @return mixed
     */
    public function delete(User $user, Resource $resource)
    {
        //
    }

    /**
     * Determine whether the user can restore the term.
     *
     * @param  \App\Models\Resource  $term
     * @return mixed
     */
    public function restore(User $user, Resource $resource)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the term.
     *
     * @param  \App\Models\Resource  $term
     * @return mixed
     */
    public function forceDelete(User $user, Resource $resource)
    {
        //
    }
}
