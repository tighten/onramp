<?php

namespace App\Policies;

use App\Models\Term;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TermPolicy
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
     */
    public function view(User $user, Term $term): bool
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
     */
    public function update(User $user, Term $term): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the term.
     */
    public function delete(User $user, Term $term): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the term.
     */
    public function restore(User $user, Term $term): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the term.
     */
    public function forceDelete(User $user, Term $term): bool
    {
        //
    }
}
