<?php

namespace App;

use App\Link; //Rajouter qu'on travaille avec le model User
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /*
     * On ajoute "name" dans les attributs assignables
     */
    protected $fillable = ['name'];

    /*
     * Relation : chaque tâche appartient à un user
     */
}
