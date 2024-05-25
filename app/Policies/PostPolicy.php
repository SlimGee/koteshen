<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Post  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all posts');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return bool
     */
    public function view(User $user, Post $post): bool
    {
        return $user->can('view post', $post);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create post');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return bool
     */
    public function update(User $user, Post $post): bool
    {
        return $user->can('update post', $post);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return bool
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->can('delete post', $post);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return bool
     */
    public function restore(User $user, Post $post): bool
    {
        return $user->can('restore post', $post);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return bool
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return $user->can('force delete post', $post);
    }
}
