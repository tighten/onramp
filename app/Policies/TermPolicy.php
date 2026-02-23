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

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, Term $term): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, Term $term): bool
    {
        //
    }

    public function delete(User $user, Term $term): bool
    {
        //
    }

    public function restore(User $user, Term $term): bool
    {
        //
    }

    public function forceDelete(User $user, Term $term): bool
    {
        //
    }
}
