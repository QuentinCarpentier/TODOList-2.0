<?php

namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository
{

    /*
     * Avoir toutes les taches d'un user donn�
     */
    public function forUser(User $user)
    {
        return Task::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}