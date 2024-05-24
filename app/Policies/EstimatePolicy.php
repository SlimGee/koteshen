<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Estimate;
use App\Models\User;

class EstimatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Estimate  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all estimates');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Estimate  $estimate
     * @return bool
     */
    public function view(User $user, Estimate $estimate): bool
    {
        return $user->can('view estimate', $estimate);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create estimate');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Estimate  $estimate
     * @return bool
     */
    public function update(User $user, Estimate $estimate): bool
    {
        return $user->can('update estimate', $estimate);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Estimate  $estimate
     * @return bool
     */
    public function delete(User $user, Estimate $estimate): bool
    {
        return $user->can('delete estimate', $estimate);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Estimate  $estimate
     * @return bool
     */
    public function restore(User $user, Estimate $estimate): bool
    {
        return $user->can('restore estimate', $estimate);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Estimate  $estimate
     * @return bool
     */
    public function forceDelete(User $user, Estimate $estimate): bool
    {
        return $user->can('force delete estimate', $estimate);
    }
}
