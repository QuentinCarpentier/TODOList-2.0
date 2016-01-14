<?php

namespace App\Repositories;

use App\User;
use App\Link;

class LinkRepository
{

    /*
     * Avoir toutes les taches d'un user donn�
     */
    public function forUser(User $user)
    {
        return Link::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}