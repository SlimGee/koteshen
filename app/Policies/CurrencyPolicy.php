<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Currency;
use App\Models\User;

class CurrencyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Currency  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all currencies');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Currency  $currency
     * @return bool
     */
    public function view(User $user, Currency $currency): bool
    {
        return $user->can('view currency', $currency);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create currency');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Currency  $currency
     * @return bool
     */
    public function update(User $user, Currency $currency): bool
    {
        return $user->can('update currency', $currency);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Currency  $currency
     * @return bool
     */
    public function delete(User $user, Currency $currency): bool
    {
        return $user->can('delete currency', $currency);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Currency  $currency
     * @return bool
     */
    public function restore(User $user, Currency $currency): bool
    {
        return $user->can('restore currency', $currency);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Currency  $currency
     * @return bool
     */
    public function forceDelete(User $user, Currency $currency): bool
    {
        return $user->can('force delete currency', $currency);
    }
}
