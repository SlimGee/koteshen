<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Invoice;
use App\Models\User;

class InvoicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Invoice  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all invoices');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Invoice  $invoice
     * @return bool
     */
    public function view(User $user, Invoice $invoice): bool
    {
        return $user->can('view invoice', $invoice);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create invoice');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Invoice  $invoice
     * @return bool
     */
    public function update(User $user, Invoice $invoice): bool
    {
        return $user->can('update invoice', $invoice);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Invoice  $invoice
     * @return bool
     */
    public function delete(User $user, Invoice $invoice): bool
    {
        return $user->can('delete invoice', $invoice);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Invoice  $invoice
     * @return bool
     */
    public function restore(User $user, Invoice $invoice): bool
    {
        return $user->can('restore invoice', $invoice);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Invoice  $invoice
     * @return bool
     */
    public function forceDelete(User $user, Invoice $invoice): bool
    {
        return $user->can('force delete invoice', $invoice);
    }
}
