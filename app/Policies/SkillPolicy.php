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
     *
     * @return mixed
     */
    public function viewAny(User $user): bool
    {
        return $user->isAtLeastEditor();
    }

    /**
     * Determine whether the user can view the skill.
     *
     * @return mixed
     */
    public function view(User $user, Skill $skill): bool
    {
        return $user->isAtLeastEditor();
    }

    /**
     * Determine whether the user can create skills.
     *
     * @return mixed
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the skill.
     *
     * @return mixed
     */
    public function update(User $user, Skill $skill): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the skill.
     *
     * @return mixed
     */
    public function delete(User $user, Skill $skill): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the skill.
     *
     * @return mixed
     */
    public function restore(User $user, Skill $skill): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the skill.
     *
     * @return mixed
     */
    public function forceDelete(User $user, Skill $skill): bool
    {
        //
    }
}
