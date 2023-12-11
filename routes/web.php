<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/show-latest-post', [PostController::class, 'showLatestPost']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profil', function (Request $request) {
    return [
        "name" => $request->input('name', 'Philip philip')
    ];
});

Route::get('/profil/{slug}/{id}', function (string $slug, string $id, Request $request) {
    return [
        "slug" => $slug,
        "id" => $id,
        "name" => $request->input('name'), // l'objet request peut être ajouter: url[...]/post/1?name=Philip
    ];
})->where([ // permet de spécifier des contraintes sur les paramètres (par ex: assigner uniquement des chiffres)
    'id' => '[0-9]+', // ici on indique que l'on accepte une suite de chiffre pour l'id 
    'slug'=> '[a-z0-9\-]+', // ici on indique que l'on autorise: char, chiffres & "-"
]) ;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/feed', function () {
        return view('feed.index');
});

