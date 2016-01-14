<?php

namespace App\Policies;

use App\User;
use App\Link;
use Illuminate\Auth\Access\HandlesAuthorization;

class LinkPolicy
{
    use HandlesAuthorization;

    /*
    Permet de déterminer si un user donné peut supprimer une tache donnée
    */
    public function destroy(User $user, Link $link)
    {
        return $user->id === $link->user_id;
    }
}
