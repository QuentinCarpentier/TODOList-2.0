<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Task;
use App\Http\Requests;
use app\Repositories\TaskRepository;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /*
     * Cr�ation d'une nouvelle instance du controller
     * Ajouter un middleware sur auth permet � nos t�ches
     * d'�tre vues uniquement par des users authentifi�s
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $tasks;
    public function index(Request $request)
    {

        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function store(Request $request)
    {
        /*
         * Valider le formulaire avec un nom>255 characters
         */
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        /*
         * Permet la création d'une tâche par un utilisateur
         */
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

//        Une fois la tâche crée, retour au /tasks
        return redirect('/tasks');
    }
}
