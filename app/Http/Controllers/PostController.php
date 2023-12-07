<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    //

    public function index (): View {
        return view('feed.index');
    }
}
