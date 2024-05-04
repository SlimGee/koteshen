<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Comment  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all comments');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Comment  $comment
     * @return bool
     */
    public function view(User $user, Comment $comment): bool
    {
        return $user->can('view comment', $comment);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create comment');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Comment  $comment
     * @return bool
     */
    public function update(User $user, Comment $comment): bool
    {
        return $user->can('update comment', $comment);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Comment  $comment
     * @return bool
     */
    public function delete(User $user, Comment $comment): bool
    {
        return $user->can('delete comment', $comment);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Comment  $comment
     * @return bool
     */
    public function restore(User $user, Comment $comment): bool
    {
        return $user->can('restore comment', $comment);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Comment  $comment
     * @return bool
     */
    public function forceDelete(User $user, Comment $comment): bool
    {
        return $user->can('force delete comment', $comment);
    }
}
