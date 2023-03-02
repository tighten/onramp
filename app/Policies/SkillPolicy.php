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

    /**
     * Determine whether the user can create skills.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the skill.
     */
    public function update(User $user, Skill $skill): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the skill.
     */
    public function delete(User $user, Skill $skill): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the skill.
     */
    public function restore(User $user, Skill $skill): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the skill.
     */
    public function forceDelete(User $user, Skill $skill): bool
    {
        //
    }
}
