<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Country;
use App\Models\User;

class CountryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Country  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all countries');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Country  $country
     * @return bool
     */
    public function view(User $user, Country $country): bool
    {
        return $user->can('view country', $country);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create country');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Country  $country
     * @return bool
     */
    public function update(User $user, Country $country): bool
    {
        return $user->can('update country', $country);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Country  $country
     * @return bool
     */
    public function delete(User $user, Country $country): bool
    {
        return $user->can('delete country', $country);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Country  $country
     * @return bool
     */
    public function restore(User $user, Country $country): bool
    {
        return $user->can('restore country', $country);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Country  $country
     * @return bool
     */
    public function forceDelete(User $user, Country $country): bool
    {
        return $user->can('force delete country', $country);
    }
}
