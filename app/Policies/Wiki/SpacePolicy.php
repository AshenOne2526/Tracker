<?php

namespace App\Policies\Wiki;

use App\Models\User;
use App\Models\Wiki\Space;

class SpacePolicy
{
    /**
     * Every authenticated user may open the wiki; the listing itself is filtered.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Space $space): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role->canCreateSpaces();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Space $space): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Space $space): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Space $space): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Space $space): bool
    {
        return false;
    }
}
