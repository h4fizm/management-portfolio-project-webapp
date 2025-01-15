<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the profile.
     *
     * @param  \App\Models\User  $currentUser
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function update(User $currentUser, User $user)
    {
        // Memastikan bahwa pengguna hanya dapat mengedit profilnya sendiri
        return $currentUser->id === $user->id;
    }
}
