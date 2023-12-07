<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    //

    public function index (): Paginator {
       return \App\Models\Post::paginate(25);
       // $posts =  (pour stocker le return du dessus quand on en aura plus besoin)
        // return view('feed.index');
    }
}
