<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        return $user->isAdmin() ?: null;
    }

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, User $model): bool
    {
        //
    }

    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, User $model): bool
    {
        //
    }

    public function delete(User $user, User $model): bool
    {
        //
    }

    public function restore(User $user, User $model): bool
    {
        //
    }

    public function forceDelete(User $user, User $model): bool
    {
        //
    }
}
