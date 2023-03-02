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

    /**
     * Determine whether the user can view any modules.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the module.
     */
    public function view(User $user, Module $module): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create modules.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the module.
     */
    public function update(User $user, Module $module): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the module.
     */
    public function delete(User $user, Module $module): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the module.
     */
    public function restore(User $user, Module $module): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the module.
     */
    public function forceDelete(User $user, Module $module): bool
    {
        //
    }

    public function attachResource(User $user, Module $module, Resource $resource)
    {
        return $user->isAtLeastEditor();
    }

    public function detachResource(User $user, Module $module, Resource $resource)
    {
        return $user->isAtLeastEditor();
    }
}
