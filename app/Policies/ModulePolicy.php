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
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Module  $module
     * @return mixed
     */
    public function view(User $user, Module $module)
    {
        return true;
    }

    /**
     * Determine whether the user can create modules.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Module  $module
     * @return mixed
     */
    public function update(User $user, Module $module)
    {
        //
    }

    /**
     * Determine whether the user can delete the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Module  $module
     * @return mixed
     */
    public function delete(User $user, Module $module)
    {
        //
    }

    /**
     * Determine whether the user can restore the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Module  $module
     * @return mixed
     */
    public function restore(User $user, Module $module)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the module.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Module  $module
     * @return mixed
     */
    public function forceDelete(User $user, Module $module)
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
