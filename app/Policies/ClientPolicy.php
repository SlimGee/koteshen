<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Client;
use App\Models\User;

class ClientPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Client  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all clients');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Client  $client
     * @return bool
     */
    public function view(User $user, Client $client): bool
    {
        return $user->can('view client', $client);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create client');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Client  $client
     * @return bool
     */
    public function update(User $user, Client $client): bool
    {
        return $user->can('update client', $client);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Client  $client
     * @return bool
     */
    public function delete(User $user, Client $client): bool
    {
        return $user->can('delete client', $client);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Client  $client
     * @return bool
     */
    public function restore(User $user, Client $client): bool
    {
        return $user->can('restore client', $client);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Client  $client
     * @return bool
     */
    public function forceDelete(User $user, Client $client): bool
    {
        return $user->can('force delete client', $client);
    }
}
