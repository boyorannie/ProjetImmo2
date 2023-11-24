<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        
        return view('article.listeArticle',compact('articles'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('article.articles');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'type' => 'required',
            'statut' => 'required',
            'nombreToilette' => 'required|integer|min:0',
            'nombreBalcon' => 'required|integer|min:0',
            'espaceVert' => 'required|string',
            'dimension' => 'required|numeric|min:0',
        ]);
        // dd($request->get('type'));
        $imagePath = $request->file('image')->store('images/article', 'public');

        $articles = new Article();
        $articles->nom = $request->get('nom');
        $articles->description = $request->get('description');
        $articles->image = $imagePath;
        $articles->type = $request->get('type');
        $articles->statut = $request->get('statut');
       
        $articles->nombreToilette = $request->get('nombreToilette');
        $articles->nombreBalcon= $request->get('nombreBalcon');
        $articles->espaceVert = $request->get('espaceVert');
        $articles->dimension = $request->get('dimension');
        $articles->user_id = 1;

        $articles->save();
        return back()->with('success', 'Article enregistre avec succès');
        // return view('article.listeArticle', compact('articles'));
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
        // $articles = Article::all(); // Récupérer tous les biens depuis le modèle article
        // return view('article.listeArticle', compact('articles')); // Passer les Articles à la vue
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $articles = Article::findOrFail($id);
      
        return view('article.modifier',compact('articles'));

        
       


    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, $id)
    {
        //
            $request->validate([
                'nom' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'type' => 'required',
                'statut' => 'required',
                'nombreToilette' => 'required|integer|min:0',
                'nombreBalcon' => 'required|integer|min:0',
                'espaceVert' => 'required|string',
                'dimension' => 'required|numeric|min:0',
            ]);
       $imagePath = $request->file('image')->store('images/article', 'public');

        $articles = Article::findOrFail($id);
        $articles->nom = $request->get('nom');
        $articles->description = $request->get('description');
        $articles->image = $imagePath;
        $articles->type = $request->get('type');
        $articles->statut = $request->get('statut');
       
        $articles->nombreToilette = $request->get('nombreToilette');
        $articles->nombreBalcon= $request->get('nombreBalcon');
        $articles->espaceVert = $request->get('espaceVert');
        $articles->dimension = $request->get('dimension');
        $articles->user_id = 1;
        // dd($request);

        // dd($articles);

        $articles->update();

        return back()->with('success', 'Article Article ajouter avec succès');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $articles = Article::findOrFail($id);
        Storage::disk('public')->delete($articles->image);
        $articles->delete();
        return back()->with('success', 'Article supprimer avec succès');

    }
}
