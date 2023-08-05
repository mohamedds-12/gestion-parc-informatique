<?php

namespace App\Http\Controllers;

use App\Helpers\Tools;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Êtes-vous sûrs ?', 'Êtes-vous sûr de vouloir supprimer ce fournisseur ?');
        return view('fournisseurs.index', [
            'fournisseurs' => Fournisseur::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fournisseurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:20',
        ]);

        Fournisseur::create([
            'num_fournisseur' => Tools::generateModelNumber(Fournisseur::class),
            'nom' => $request->nom,
        ]);

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur ajouté avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($num_fournisseur)
    {
        return view('fournisseurs.edit', [
            'fournisseur' => Fournisseur::find($num_fournisseur),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $num_fournisseur)
    {
        $fournisseur = Fournisseur::find($num_fournisseur);

        $request->validate([
            'nom' => 'required|max:20',
        ]);

        $fournisseur->update([
            'nom' => $request->nom,
        ]);

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($num_fournisseur)
    {
        Fournisseur::find($num_fournisseur)->delete();
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur supprimé avec succès');
    }
}
