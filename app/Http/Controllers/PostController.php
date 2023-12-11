<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Pagination\Paginator;
use app\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function showLatestPost()
    {
        $latestPost = Post::latest()->first();
        return view("dashboard.blade.php")->with('dashboard.blade.php', $latestPost);
    }

    public function index (): Paginator {
       return Post::paginate(25);
       // $posts =  (pour stocker le return du dessus quand on en aura plus besoin)
        // return view('feed.index');
    }
}
