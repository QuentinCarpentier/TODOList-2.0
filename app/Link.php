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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
