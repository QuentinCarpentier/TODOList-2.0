<?php

namespace App\Http\Controllers;

use App\Link;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LinkRepository;

class LinkController extends Controller
{
    public function __construct(LinkRepository $links)
    {
        $this->middleware('auth');
        $this->links = $links;
    }
}
