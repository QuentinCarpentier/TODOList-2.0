<?php

namespace App\Policies;

use App\User;
use App\Link;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /*
    Permet de déterminer si un user donné peut supprimer une tache donnée
    */
    public function destroy(User $user, Task $task)
    {
        return $user->id === $link->user_id;
    }
}
