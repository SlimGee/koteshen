<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Tax;
use App\Models\User;

class TaxPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Tax  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all taxes');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Tax  $tax
     * @return bool
     */
    public function view(User $user, Tax $tax): bool
    {
        return $user->can('view tax', $tax);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create tax');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Tax  $tax
     * @return bool
     */
    public function update(User $user, Tax $tax): bool
    {
        return $user->can('update tax', $tax);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Tax  $tax
     * @return bool
     */
    public function delete(User $user, Tax $tax): bool
    {
        return $user->can('delete tax', $tax);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Tax  $tax
     * @return bool
     */
    public function restore(User $user, Tax $tax): bool
    {
        return $user->can('restore tax', $tax);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Tax  $tax
     * @return bool
     */
    public function forceDelete(User $user, Tax $tax): bool
    {
        return $user->can('force delete tax', $tax);
    }
}
