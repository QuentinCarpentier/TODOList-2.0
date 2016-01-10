<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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

    public function index(Request $request)
    {
        return view('tasks.index');
    }
}
