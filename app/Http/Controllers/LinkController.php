<?php

namespace App\Http\Controllers;

use App\Link;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LinkRepository;

class LinkController extends Controller
{
    protected $links;

    public function __construct(LinkRepository $links)
    {
        $this->middleware('auth');
        $this->links = $links;
    }

    public function index(Request $request)
    {

        return view('list.index', [
            'links' => $this->links->forUser($request->user()),
        ]);
    }

    public function store(Request $request)
    {

//        Valider le formulaire avec un nom>255 characters
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);


//        Permet la création d'une liste par un utilisateur
        $request->user()->links()->create([
            'name' => $request->name,
        ]);

        return redirect('/links');
    }

    public function destroy(Request $request, Link $link)
    {
        /*
        'detroy' ? nom de la méthode Policy que nous voulons appeler
        $task ? l'instance du modèle
        Le Task Model correspond à la TaskPolicy, donc Laravel sait sur quelle policy tirer la méthode destroy
        */
        $this->authorize('destroy', $link);
        /*
        Supprimer la tache et renvoyer /tasks
        */
        $link->delete();
        return redirect('/links');
    }
}

