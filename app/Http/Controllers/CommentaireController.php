<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentaireController extends Controller
{
    public function store(Request $request, $id_article)
    {
        $request->validate([
            'contenue' => 'required|string|min:3|max:200',
        ]);
        $user = Auth::user()->id;

        $commentaire = new Commentaire();
        $commentaire->contenu = $request->get('contenue');
        $commentaire->article_id = $id_article;
        $commentaire->user_id = $user;

        $commentaire->save();

        return back()->with('status', 'Votre commentaire a ètè ajoutè avec success');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        return view('user.commentaire.modifier', ['commentaire' => $commentaire]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'contenu' => 'required|string|min:3|max:200',
        ]);
        $commentaire = Commentaire::findOrFail($id);
        $commentaire->contenu = $request->get('contenu');

        $commentaire->update();

        return Redirect::to('/articl/' . $commentaire->article_id)->with('status', 'Votre commentaire a ètè modifiè avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        $commentaire->delete();

        return back()->with('status', 'Votre commentaire a ètè supprimè avec success');
    }
}
