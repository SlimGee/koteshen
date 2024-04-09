<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Business;
use App\Models\User;

class BusinessPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Business  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all businesses');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Business  $business
     * @return bool
     */
    public function view(User $user, Business $business): bool
    {
        return $user->can('view business', $business);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create business');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Business  $business
     * @return bool
     */
    public function update(User $user, Business $business): bool
    {
        return $user->can('update business', $business);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Business  $business
     * @return bool
     */
    public function delete(User $user, Business $business): bool
    {
        return $user->can('delete business', $business);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Business  $business
     * @return bool
     */
    public function restore(User $user, Business $business): bool
    {
        return $user->can('restore business', $business);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Business  $business
     * @return bool
     */
    public function forceDelete(User $user, Business $business): bool
    {
        return $user->can('force delete business', $business);
    }
}
