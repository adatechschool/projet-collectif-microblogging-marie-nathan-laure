<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\BiographyController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageUploadController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profil', function (Request $request) {
    $user = auth()->user(); // récupère l'ensemble des données du user
    $posts =\App\Models\Post::where('user_id',$user['id'])->orderByDesc('created_at')->get();
    return view('profil', ['profil' => $posts, 'user'=> $user]);
    // view('profil');
})->name('profil');

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

// Route::get('/add_images', function () {
//     return view('add_images');
// });

// Route::get('/view_images', function () {
//     return view('view_images');
// });

Route::get('/feed', function () {
    return view('feed.index');
});

// Routes pour uploader une image
//For adding an image
Route::get('/add_images',[ImageUploadController::class,'addImage'])->name('images.add');

//For storing an image
Route::post('/store-image',[ImageUploadController::class,'storeImage'])
->name('images.store');

//For showing an image
Route::get('/view_images',[ImageUploadController::class,'viewImage'])->name('images.view');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('update-biography', [BiographyController::class, 'update'])->name('biography.update');
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/post/create', [PostController::class, 'create']);
    Route::post('/post/store', [PostController::class, 'store']);
});




