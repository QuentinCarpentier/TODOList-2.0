<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'name','body',
    ];

    /*
     * Relation : chaque tâche appartient à un user
     */
    public function tasks()
    {
        return $this->belongsTo('App\Task');
    }
}
