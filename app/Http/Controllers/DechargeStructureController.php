<?php

namespace App\Http\Controllers;

use App\Helpers\Tools;
use App\Models\Employe;
use App\Models\Materiel;
use Illuminate\Http\Request;
use App\Enums\MaterielStatus;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DechargeStructure;

class DechargeStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Êtes-vous sûrs ?', 'Êtes-vous sûr de vouloir supprimer cet réformation ?');
        return view('reformations.index', [
            'decharges_structure' => DechargeStructure::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reformations.create', [
            'materiels' => Materiel::whereNotIn('etat', [MaterielStatus::En_Reformation])->get(),
            'employees' => Employe::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'materiels' => 'required|array',
            'employe' =>'required',
        ]);

        $decharge_structure = DechargeStructure::create([
            'code_decharge' => Tools::generateReformationCode(Materiel::find($request->materiels[0])),
            'matricule_employe' => $request->employe,
            'date_decharge' => now(),
        ]);


        foreach ($request->materiels as $materielId) {
            // Update materiel status && Attach to the decharge structure
            Materiel::find($materielId)->update([
                'etat' => MaterielStatus::En_Reformation,
                'code_decharge_structure' => $decharge_structure->code_decharge
            ]);
        }

        return redirect()->route('decharges_structure.index')->with('success', 'Réformation creé avec succès');
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
        $decharge_structure = DechargeStructure::find($code_decharge);
        return view('reformations.edit', [
            'decharge_structure' => $decharge_structure,
            'materiels' => Materiel::whereNotIn('etat', [MaterielStatus::En_Reformation])
                ->get()
                ->merge($decharge_structure->materiels),
            'employees' => Employe::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $code_decharge)
    {
        $decharge_structure = DechargeStructure::find($code_decharge);
        $request->validate([
            'materiels' => 'required|array',
            'employe' =>'required',
        ]);

        $decharge_structure->update([
            'matricule_employe' => $request->employe,
        ]);

        foreach ($decharge_structure->materiels as $materiel) {
            if (! in_array($materiel->matricule, $request->materiels)) {
                // reset old decharge materiels status
                $materiel->update([
                    'etat' => MaterielStatus::Non_Affecte,
                    'code_decharge_structure' => null
                ]);
            }

        }

        foreach ($request->materiels as $materielId) {
            // Update materiel status && Attach to the decharge structure
            Materiel::find($materielId)->update([
                'etat' => MaterielStatus::En_Reformation,
                'code_decharge_structure' => $decharge_structure->code_decharge
            ]);
        }

        return redirect()->route('decharges_structure.index')->with('success', 'Réformation mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($code_decharge)
    {
        $decharge_structure = DechargeStructure::find($code_decharge);

        foreach ($decharge_structure->materiels as $materiel) {
            // Update materiel status
            $materiel->update([
                'etat' => MaterielStatus::Non_Affecte
            ]);
        }

        $decharge_structure->delete();

        return redirect()->route('decharges_structure.index')->with('success', 'Réformation supprimé avec succès');
    }

    public function print($code_decharge)
    {
        $decharge_structure = DechargeStructure::find($code_decharge);

        return Pdf::loadView('pdf-templates.decharge_structure', [
            'decharge_structure' => $decharge_structure
        ])->stream();
    }
}
