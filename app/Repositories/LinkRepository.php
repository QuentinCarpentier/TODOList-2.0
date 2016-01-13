<?php

namespace App\Repositories;

use App\User;
use App\Link;

class TaskRepository
{

    /*
     * Avoir toutes les taches d'un user donné
     */
    public function forUser(User $user)
    {
        return Task::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}