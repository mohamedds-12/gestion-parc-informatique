<?php

namespace App\Http\Controllers;

use App\Helpers\Tools;
use App\Models\Employe;
use App\Models\Materiel;
use App\Models\BonSortie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BonSortieController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Êtes-vous sûrs ?', "Êtes-vous sûr de vouloir supprimer ce bon de sortie ?");
        return view('bons_sortie.index', [
            'bons_sortie' => BonSortie::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bons_sortie.create', [
            'employees' => Employe::all(),
            'materiels' => Materiel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'observation' => 'required',
            'employe' =>'required',
            'materiel' => 'required'
        ]);

        BonSortie::create([
            'num_bs' => Tools::generateModelNumber(BonSortie::class),
            'observation' => $request->observation,
            'matricule_employe' => $request->employe,
            'matricule_materiel' => $request->materiel,
            'date_sortie' => now()
        ]);

        return redirect()->route('bons_sortie.index')->with('success', "Bon de sortie creé avec succès");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($num_bs)
    {
        $bon_sortie = BonSortie::find($num_bs);

        return view('bons_sortie.edit', [
            'bon_sortie' => $bon_sortie,
            'employees' => Employe::all(),
            'materiels' => Materiel::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $num_bs)
    {
        $request->validate([
            'observation' => 'required',
            'employe' =>'required',
            'materiel' => 'required'
        ]);

        BonSortie::find($num_bs)->update([
            'observation' => $request->observation,
            'matricule_employe' => $request->employe,
            'matricule_materiel' => $request->materiel,
        ]);

        return redirect()->route('bons_sortie.index')->with('success', "Bon de sortie mis à jouravec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($num_bs)
    {
        BonSortie::find($num_bs)->delete();
        return redirect()->route('bons_sortie.index')->with('success', "Bon de sortie supprimé avec succès");
    }
}

