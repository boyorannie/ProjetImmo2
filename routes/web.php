<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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
    return view('user.article.index');
});
Route::get('/mail','App\Http\Controllers\TestController@envoiMail',);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('users')->middleware('auth')->group(function () {
    route::post('/commenter/{id_article}', [CommentaireController::class, 'store']);
    route::get('/commenter/voir/{id}', [CommentaireController::class, 'edit']);
    route::patch('/commenter/moidier/{id}', [CommentaireController::class, 'update']);
    route::delete('/commenter/supprimer/{id}', [CommentaireController::class, 'destroy']);
});

Route::get('home', [HomeController::class, 'index']);

require __DIR__ . '/auth.php';



// route pour les articles

// Route::get('/articles', [ArticleController::class,'index']);
// Route::POST('/article/listeArticle/',[ArticleController::class,'store']);

Route::get('/liste', [ArticleController::class, 'index']);
Route::get('/pageAcueille', [ArticleController::class, 'create']);
Route::POST('/EnregistrementBaseDeDonne', [ArticleController::class, 'store']);

Route::delete('/Supprimer/{id}', [ArticleController::class, 'destroy']);
Route::get('/modifier/{id}', [ArticleController::class, 'edit']);
Route::patch('/misAjour/{id}', [ArticleController::class, 'update']);


