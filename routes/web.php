<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\BiographyController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// use App\Http\Controllers\ImageUploadController;

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
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    $posts =\App\Models\Post::orderByDesc('created_at')->get();
    return view('dashboard',['posts' => $posts]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profil', function (Request $request) {
    $user = auth()->user(); // récupère l'ensemble des données du user
    $posts =\App\Models\Post::where('user_id',$user['id'])->orderByDesc('created_at')->get();
    return view('profil', ['profil' => $posts, 'user'=> $user]);
    // view('profil');
})->name('profil');

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




