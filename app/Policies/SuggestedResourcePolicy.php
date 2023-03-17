<?php

namespace App\Policies;

use App\Models\SuggestedResource;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuggestedResourcePolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        return $user->isAtLeastEditor() ?: null;
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, SuggestedResource $suggestedResource): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, SuggestedResource $suggestedResource): bool
    {
        return $user->id === $suggestedResource->user_id || $user->isAtLeastEditor();
    }

    public function delete(User $user, SuggestedResource $suggestedResource): bool
    {
        return $user->id === $suggestedResource->user_id;
    }

    public function restore(User $user, SuggestedResource $suggestedResource): bool
    {
        //
    }

    public function forceDelete(User $user, SuggestedResource $suggestedResource): bool
    {
        //
    }
}
