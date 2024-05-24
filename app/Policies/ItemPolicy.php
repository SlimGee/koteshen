<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Item;
use App\Models\User;

class ItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Item  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all items');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Item  $item
     * @return bool
     */
    public function view(User $user, Item $item): bool
    {
        return $user->can('view item', $item);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create item');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Item  $item
     * @return bool
     */
    public function update(User $user, Item $item): bool
    {
        return $user->can('update item', $item);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Item  $item
     * @return bool
     */
    public function delete(User $user, Item $item): bool
    {
        return $user->can('delete item', $item);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Item  $item
     * @return bool
     */
    public function restore(User $user, Item $item): bool
    {
        return $user->can('restore item', $item);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Item  $item
     * @return bool
     */
    public function forceDelete(User $user, Item $item): bool
    {
        return $user->can('force delete item', $item);
    }
}
