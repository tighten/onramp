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

    /**
     * Determine whether the user can view any skills.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAtLeastEditor();
    }

    /**
     * Determine whether the user can view the skill.
     */
    public function view(User $user, Skill $skill): bool
    {
        return $user->isAtLeastEditor();
    }
}
