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

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, User $model): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Resource $resource): bool
    {
        return false;
    }

    public function delete(User $user, Resource $resource): bool
    {
        return false;
    }

    public function restore(User $user, Resource $resource): bool
    {
        return false;
    }

    public function forceDelete(User $user, Resource $resource): bool
    {
        return false;
    }
}
