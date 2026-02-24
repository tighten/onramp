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
        return false;
    }

    public function view(User $user, Term $term): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Term $term): bool
    {
        return false;
    }

    public function delete(User $user, Term $term): bool
    {
        return false;
    }

    public function restore(User $user, Term $term): bool
    {
        return false;
    }

    public function forceDelete(User $user, Term $term): bool
    {
        return false;
    }
}
