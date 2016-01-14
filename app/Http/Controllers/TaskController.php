<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{


//    Instance du Task Repository
    protected $tasks;

    /*
     * Creation d'une nouvelle instance du controller
     * Ajouter un middleware sur auth permet a nos taches
     * d'etre vues uniquement par des users authentifies
     * → Restreindre l'accès aux routes relatives à Task
     * pour nos users authentifiés seulement
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    public function about()
    {
        return view('about.apropos');
    }
    /*
     * Affiche une liste de toutes les taches de l'user
     */
    public function index(Request $request, TaskRepository $tasks)
    {
        return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
        //->with('tasks', $tasks);
    }

    /*
     * Store fonction : Valider le formulaire et créer une Task
     */
    public function store(Request $request)
    {

//        Valider le formulaire avec un nom>255 characters
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);


//        Permet la création d'une tâche par un utilisateur
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);


//        Une fois la tâche créée, retour au /tasks
        return redirect('link/{task}');
    }

    /*
     * Détruire une tache
     */
    public function destroy(Request $request, Task $task)
    {
        /*
        'detroy' → nom de la méthode Policy que nous voulons appeler
        $task → l'instance du modèle
        Le Task Model correspond à la TaskPolicy, donc Laravel sait sur quelle policy tirer la méthode destroy
        */
        $this->authorize('destroy', $task);
        /*
        Supprimer la tache et renvoyer /tasks
        */
        $task->delete();
        return redirect('link/{task}');
    }
}
