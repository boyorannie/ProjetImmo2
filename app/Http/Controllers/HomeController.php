<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $role = Auth::user()->role; 
            if ($role == 1) {
                return Redirect::to('/admin/dashboard');
            } else {
                return Redirect::to('/');
            }
        }
    }
    public function dashboard()
    {
        $articles = Article::all();
        $commentaires = Commentaire::all();
        $uers = User::all();
        return view('admin.dashboard', compact('articles', 'commentaires', 'uers'));
    }
}
