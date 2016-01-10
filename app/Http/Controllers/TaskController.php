<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /*
     * Création d'une nouvelle instance du controller
     * Ajouter un middleware sur auth permet à nos tâches
     * d'être vues uniquement par des users authentifiés
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('tasks.index');
    }
}
