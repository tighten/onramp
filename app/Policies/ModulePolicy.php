<?php

namespace App\Policies;

use App\Models\Module;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModulePolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        return $user->isAdmin() ?: null;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Module $module): bool
    {
        return true;
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Module $module): bool
    {
        return false;
    }

    public function delete(User $user, Module $module)
    {
        //
    }

    public function restore(User $user, Module $module)
    {
        //
    }

    public function forceDelete(User $user, Module $module)
    {
        //
    }

    public function attachResource(User $user, Module $module, Resource $resource): bool
    {
        return $user->isAtLeastEditor();
    }

    public function detachResource(User $user, Module $module, Resource $resource): bool
    {
        return $user->isAtLeastEditor();
    }
}
