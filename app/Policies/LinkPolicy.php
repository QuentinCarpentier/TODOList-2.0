<?php

namespace App\Policies;

use App\User;
use App\Link;
use Illuminate\Auth\Access\HandlesAuthorization;

class LinkPolicy
{
    use HandlesAuthorization;

    /*
    Permet de d�terminer si un user donn� peut supprimer une tache donn�e
    */
    public function destroy(User $user, Link $link)
    {
        return $user->id === $link->user_id;
    }
}
