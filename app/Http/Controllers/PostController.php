<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        $publications = Post::all();
        return view('dashboard', compact('publications'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        // Valide les données du formulaire
        $validatedData = $request->validate([
            'content' => 'required|max:255',
            'picture' => 'nullable',
            // Ajoute d'autres règles de validation selon tes besoins
        ]);

        $validatedData['user_id'] = auth()->user()->id;


        // Crée une nouvelle publication
        Post::create($validatedData);

        // Redirige vers la liste des publications avec un message de succès
        return redirect('/post')->with('success', 'Publication créée avec succès!');
    }
}
