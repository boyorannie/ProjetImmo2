<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    public function store(Request $request, $id_article)
    {
        $request->validate([
            'contenue' => 'required|string|min:3|max:200',
        ]);
        $user = Auth::user()->id;

        $commentaire = new Commentaire();
        $commentaire->contenu = $request->get('contenu');
        $commentaire->contenu = $id_article;
        $commentaire->contenu = $user;

        $commentaire->save();

        return back()->with('status', 'Votre commentaire a ètè ajoutè avec success');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commentaire $commentaire)
    {
        return view('users.modifier', ['commentaire' => $commentaire]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        $commentaire->contenu = $request->get('contenu');

        $commentaire->update();

        return back()->with('status', 'Votre commentaire a ètè modifiè avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();

        return back()->with('status', 'Votre commentaire a ètè supprimè avec success');
    }
}
