<?php

namespace App\Policies;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkillPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        return $user->isAdmin() ?: null;
    }

    public function viewAny(User $user): bool
    {
        return $user->isAtLeastEditor();
    }

    public function view(User $user, Skill $skill): bool
    {
        return $user->isAtLeastEditor();
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Skill $skill): bool
    {
        return false;
    }

    public function delete(User $user, Skill $skill): bool
    {
        return false;
    }

    public function restore(User $user, Skill $skill): bool
    {
        return false;
    }

    public function forceDelete(User $user, Skill $skill): bool
    {
        return false;
    }
}
