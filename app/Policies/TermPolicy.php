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

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Term $term)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Term $term)
    {
        //
    }

    public function delete(User $user, Term $term)
    {
        //
    }

    public function restore(User $user, Term $term)
    {
        //
    }

    public function forceDelete(User $user, Term $term)
    {
        //
    }
}
