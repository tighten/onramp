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
     * Determine whether the user can update the resource.
     *
     * @param  \App\Models\Resource  $resource
     */
    public function update(User $user, Resource $resource): bool
    {
        return false;
    }
}
