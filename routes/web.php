<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ChambreController;
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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('users')->middleware('auth')->group(function () {
    route::post('/commenter/{id_article}', [CommentaireController::class, 'store'])->name('commenter');
    route::get('/commenter/voir/{id}', [CommentaireController::class, 'edit'])->name('commenterVoir');
    route::patch('/commenter/moidier/{id}', [CommentaireController::class, 'update'])->name('commenterModifier');
    route::delete('/commenter/supprimer/{id}', [CommentaireController::class, 'destroy'])->name('commenterSupprimer');
});

Route::get('home', [HomeController::class, 'index']);
Route::get('/', [ArticleController::class, 'index2']);
Route::get('/articl/{id}', [ArticleController::class, 'show2'])->name('voirArticle');
Route::get('/mail', 'App\Http\Controllers\TestController@envoiMail',);

Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard']);
    Route::get('/articles', [ArticleController::class, 'index']);
    Route::get('/articles/ajouter', [ArticleController::class, 'create']);
    Route::post('/EnregistrementBaseDeDonne', [ArticleController::class, 'store'])->name('ajouter_article');
    Route::get('modifier/{id}', [ArticleController::class, 'edit']);
    Route::patch('/misAjour/{id}', [ArticleController::class, 'update'])->name('ajouter_modifier');
    Route::get('/article/{id}', [ArticleController::class, 'show']);
    Route::delete('/Supprimer/{id}', [ArticleController::class, 'destroy']);

    Route::post('/ajouter/chambre/{id}', [ChambreController::class, 'store'])->name('ajouter_chambre');
    Route::get('/modifier/chambres/{id}', [ChambreController::class, 'edit'])->name('modifier_chambres');
    Route::patch('/modifier/chambre/{id}', [ChambreController::class, 'update'])->name('modifier_chambre');
    Route::delete('/supprimer/chambre/{id}', [ChambreController::class, 'destroy'])->name('supprmer_chambre');
});

require __DIR__ . '/auth.php';
