<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate(
            [
                'dimension' => 'required|numeric',
                'image.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]
        );
        foreach ($request->file('image') as $file) {
            $imagePath = $file->store('images/article', 'public');
            $imgData[] = $imagePath;
        }
        $chambre = new Chambre();

        $chambre->dimension = $request->get('dimension');
        $chambre->article_id = $id;
        $imagePaths  = implode(',', $imgData);
        $chambre->image = $imagePaths;
        $chambre->save();

        return back()->with('status', 'Chambre ajoutée avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chambre $chambre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $chambre = Chambre::findOrFail($id);
        return view('article.modifierCambre', array('chambre' => $chambre));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'dimension' => 'required|numeric',
                'image.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]
        );
        $chambre = Chambre::findOrFail($id);
        if ($request->file('image')) {
            foreach ($request->file('image') as $file) {
                $imagePath = $file->store('images/article', 'public');
                $imgData[] = $imagePath;
            }
            $imagePaths  = implode(',', $imgData);
            $chambre->image = $imagePaths;
        }

        $chambre->dimension = $request->get('dimension');
        $chambre->save();
        return Redirect::to('/admin/article/' . $chambre->article_id)->with('status', 'Chambre modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $chambre = Chambre::findOrFail($id);
        $chambre->delete();
        return back()->with('status', 'Chambre supprimé avec success');
    }
}
