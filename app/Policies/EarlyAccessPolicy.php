<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\EarlyAccess;
use App\Models\User;

class EarlyAccessPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  EarlyAccess  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all earlyaccesses');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  EarlyAccess  $earlyaccess
     * @return bool
     */
    public function view(User $user, EarlyAccess $earlyaccess): bool
    {
        return $user->can('view earlyaccess', $earlyaccess);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create earlyaccess');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  EarlyAccess  $earlyaccess
     * @return bool
     */
    public function update(User $user, EarlyAccess $earlyaccess): bool
    {
        return $user->can('update earlyaccess', $earlyaccess);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  EarlyAccess  $earlyaccess
     * @return bool
     */
    public function delete(User $user, EarlyAccess $earlyaccess): bool
    {
        return $user->can('delete earlyaccess', $earlyaccess);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  EarlyAccess  $earlyaccess
     * @return bool
     */
    public function restore(User $user, EarlyAccess $earlyaccess): bool
    {
        return $user->can('restore earlyaccess', $earlyaccess);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  EarlyAccess  $earlyaccess
     * @return bool
     */
    public function forceDelete(User $user, EarlyAccess $earlyaccess): bool
    {
        return $user->can('force delete earlyaccess', $earlyaccess);
    }
}
