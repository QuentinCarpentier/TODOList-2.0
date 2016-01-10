<?php

namespace App;

use App\User; //Rajouter qu'on travaille avec le model User
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name'];

    /*
     * Relation : chaque tâche appartient à un user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
