<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Subscription;
use App\Models\User;

class SubscriptionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Subscription  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all subscriptions');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Subscription  $subscription
     * @return bool
     */
    public function view(User $user, Subscription $subscription): bool
    {
        return $user->can('view subscription', $subscription);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create subscription');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Subscription  $subscription
     * @return bool
     */
    public function update(User $user, Subscription $subscription): bool
    {
        return $user->can('update subscription', $subscription);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Subscription  $subscription
     * @return bool
     */
    public function delete(User $user, Subscription $subscription): bool
    {
        return $user->can('delete subscription', $subscription);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Subscription  $subscription
     * @return bool
     */
    public function restore(User $user, Subscription $subscription): bool
    {
        return $user->can('restore subscription', $subscription);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Subscription  $subscription
     * @return bool
     */
    public function forceDelete(User $user, Subscription $subscription): bool
    {
        return $user->can('force delete subscription', $subscription);
    }
}
