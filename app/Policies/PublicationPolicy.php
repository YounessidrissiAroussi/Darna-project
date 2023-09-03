<?php

namespace App\Policies;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\GenericUser;

class PublicationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Publication $publication)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(GenericUser $user, Publication $publication)
    {
        return $user->id === $publication->profile_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Publication $publication)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Publication $publication)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Publication $publication)
    {
        //
    }
}
