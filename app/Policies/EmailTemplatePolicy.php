<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\EmailTemplate;
use App\Models\User;

class EmailTemplatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  EmailTemplate  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all emailtemplates');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  EmailTemplate  $emailtemplate
     * @return bool
     */
    public function view(User $user, EmailTemplate $emailtemplate): bool
    {
        return $user->can('view emailtemplate', $emailtemplate);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create emailtemplate');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  EmailTemplate  $emailtemplate
     * @return bool
     */
    public function update(User $user, EmailTemplate $emailtemplate): bool
    {
        return $user->can('update emailtemplate', $emailtemplate);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  EmailTemplate  $emailtemplate
     * @return bool
     */
    public function delete(User $user, EmailTemplate $emailtemplate): bool
    {
        return $user->can('delete emailtemplate', $emailtemplate);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  EmailTemplate  $emailtemplate
     * @return bool
     */
    public function restore(User $user, EmailTemplate $emailtemplate): bool
    {
        return $user->can('restore emailtemplate', $emailtemplate);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  EmailTemplate  $emailtemplate
     * @return bool
     */
    public function forceDelete(User $user, EmailTemplate $emailtemplate): bool
    {
        return $user->can('force delete emailtemplate', $emailtemplate);
    }
}
