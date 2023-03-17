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

    public function view(User $user, Skill $skill)
    {
        return $user->isAtLeastEditor();
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Skill $skill)
    {
        //
    }

    public function delete(User $user, Skill $skill)
    {
        //
    }

    public function restore(User $user, Skill $skill)
    {
        //
    }

    public function forceDelete(User $user, Skill $skill)
    {
        //
    }
}
