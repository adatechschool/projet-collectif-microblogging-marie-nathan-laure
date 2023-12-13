<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Postimage;

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        // Crée une nouvelle publication
        // PostController.php
        $post = Post::create([
            'content' => $validatedData['content'],
            'user_id' => $validatedData['user_id'],
        ]);

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image'), $filename);

            // Crée une nouvelle entrée dans la table des images associée à la publication
            $postImage = new Postimage(['image' => $filename]);
            $post->image()->save($postImage);
        }


        // Redirige vers la liste des publications avec un message de succès
        return redirect('/post')->with('success', 'Publication créée avec succès!');
    }
}

