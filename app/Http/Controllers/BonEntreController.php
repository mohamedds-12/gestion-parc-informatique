<?php

namespace App\Http\Controllers;

use App\Helpers\Tools;
use App\Models\Agent;
use App\Models\BonEntre;
use App\Models\Employe;
use App\Models\Materiel;
use Illuminate\Http\Request;

class BonEntreController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Êtes-vous sûrs ?', "Êtes-vous sûr de vouloir supprimer ce bon d'entré ?");
        return view('bons_entre.index', [
            'bons_entre' => BonEntre::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bons_entre.create', [
            'agents' => Agent::all(),
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
            'agent' =>'required',
            'employe' =>'required',
            'materiel' => 'required'
        ]);

        BonEntre::create([
            'num_be' => Tools::generateModelNumber(BonEntre::class),
            'observation' => $request->observation,
            'matricule_employe' => $request->employe,
            'matricule_agent' => $request->agent,
            'matricule_materiel' => $request->materiel,
            'date_entre' => now()
        ]);

        return redirect()->route('bons_entre.index')->with('success', "Bon d'entré creé avec succès");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($num_be)
    {
        $bon_entre = BonEntre::find($num_be);
        return view('bons_entre.edit', [
            'bon_entre' => $bon_entre,
            'agents' => Agent::all(),
            'employees' => Employe::all(),
            'materiels' => Materiel::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $num_be)
    {
        $request->validate([
            'observation' => 'required',
            'agent' =>'required',
            'employe' =>'required',
            'materiel' => 'required'
        ]);

        BonEntre::find($num_be)->update([
            'observation' => $request->observation,
            'matricule_employe' => $request->employe,
            'matricule_agent' => $request->agent,
            'matricule_materiel' => $request->materiel,
        ]);

        return redirect()->route('bons_entre.index')->with('success', "Bon d'entré mis à jouravec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($num_be)
    {
        BonEntre::find($num_be)->delete();
        return redirect()->route('bons_entre.index')->with('success', "Bon d'entré supprimé avec succès");
    }
}
