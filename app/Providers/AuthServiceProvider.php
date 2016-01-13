<?php

namespace App\Providers;

use App\Task;
use App\Link;
use App\Policies\TaskPolicy;
use App\Policies\LinkPolicy;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /*
   Permet de maper les polices avec l'application
   Quelle police utiliser lorsque l'on essaye d'authoriser une action d'une instance du modèle Task
   */
    protected $policies = [
        Task::class => TaskPolicy::class,
        Link::class => LinkPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
    }
}
