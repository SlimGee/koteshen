<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Payment;
use App\Models\User;

class PaymentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Payment  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all payments');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Payment  $payment
     * @return bool
     */
    public function view(User $user, Payment $payment): bool
    {
        return $user->can('view payment', $payment);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create payment');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Payment  $payment
     * @return bool
     */
    public function update(User $user, Payment $payment): bool
    {
        return $user->can('update payment', $payment);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Payment  $payment
     * @return bool
     */
    public function delete(User $user, Payment $payment): bool
    {
        return $user->can('delete payment', $payment);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Payment  $payment
     * @return bool
     */
    public function restore(User $user, Payment $payment): bool
    {
        return $user->can('restore payment', $payment);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Payment  $payment
     * @return bool
     */
    public function forceDelete(User $user, Payment $payment): bool
    {
        return $user->can('force delete payment', $payment);
    }
}
