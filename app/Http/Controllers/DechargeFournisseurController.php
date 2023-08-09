<?php

namespace App\Http\Controllers;

use App\Enums\MaterielStatus;
use App\Helpers\Tools;
use App\Models\DechargeFournisseur;
use App\Models\Fournisseur;
use App\Models\Materiel;
use Illuminate\Http\Request;

class DechargeFournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Êtes-vous sûrs ?', 'Êtes-vous sûr de vouloir supprimer cet réparation ?');
        return view('reparations.index', [
            'decharges_fournisseur' => DechargeFournisseur::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reparations.create', [
            'materiels' => Materiel::whereNotIn('etat', [MaterielStatus::En_Reformation, MaterielStatus::En_Reparation])->get(),
            'fournisseurs' => Fournisseur::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'materiels' => 'required|array',
            'fournisseur' =>'required',
            'probleme' => 'required',
            'observation' => 'required',
        ]);

        $decharge_fournisseur = DechargeFournisseur::create([
            'code_decharge' => Tools::generateReparationCode(Materiel::find($request->materiels[0])),
            'probleme' => $request->probleme,
            'observation' => $request->observation,
            'date_decharge' => now(),
            'num_fournisseur' => $request->fournisseur
        ]);

        $decharge_fournisseur->materiels()->attach($request->materiels);

        foreach ($request->materiels as $materielId) {
            // Update materiel status
            Materiel::find($materielId)->update([
                'etat' => MaterielStatus::En_Reparation
            ]);
        }

        return redirect()->route('decharges_fournisseur.index')->with('success', 'Réparation creé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materiel $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($code_decharge)
    {
        $decharge_fournisseur = DechargeFournisseur::find($code_decharge);
        return view('reparations.edit', [
            'decharge_fournisseur' => $decharge_fournisseur,
            'materiels' => Materiel::whereNotIn('etat', [MaterielStatus::En_Reformation, MaterielStatus::En_Reparation])
                ->get()
                ->merge($decharge_fournisseur->materiels),
            'fournisseurs' => Fournisseur::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $code_decharge)
    {
        $decharge_fournisseur = DechargeFournisseur::find($code_decharge);
        $request->validate([
            'materiels' => 'required|array',
            'fournisseur' =>'required',
            'probleme' => 'required',
            'observation' => 'required',
        ]);

        $decharge_fournisseur->update([
            'probleme' => $request->probleme,
            'observation' => $request->observation,
            'num_fournisseur' => $request->fournisseur
        ]);

        $decharge_fournisseur->materiels()->sync($request->materiels);

        foreach ($request->materiels as $materielId) {
            // Update materiel status
            Materiel::find($materielId)->update([
                'etat' => MaterielStatus::En_Reparation
            ]);
        }

        return redirect()->route('decharges_fournisseur.index')->with('success', 'Réparation mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($code_decharge)
    {
        $decharge_fournisseur = DechargeFournisseur::find($code_decharge);

        foreach ($decharge_fournisseur->materiels as $materiel) {
            // Update materiel status
            $materiel->update([
                'etat' => MaterielStatus::Non_Affecte
            ]);
        }

        $decharge_fournisseur->materiels()->detach();
        $decharge_fournisseur->delete();

        return redirect()->route('decharges_fournisseur.index')->with('success', 'Réparation supprimé avec succès');
    }
}
