<?php

namespace App\Http\Controllers;

use App\Enums\MaterielStatus;
use App\Helpers\Tools;
use App\Models\Affectation;
use App\Models\Employe;
use App\Models\Materiel;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Êtes-vous sûrs ?', 'Êtes-vous sûr de vouloir supprimer cet affectation ?');
        return view('affectations.index', [
            'affectations' => Affectation::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('affectations.create', [
            'employees' => Employe::all(),
            'materiels' => Materiel::where('etat', MaterielStatus::Non_Affecte)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employe' => 'required|exists:employé,matricule',
            'materiel' => 'required|exists:matériel,matricule',
        ]);

        if (Affectation::where('matricule_employe', $request->employe)->where('matricule_materiel', $request->materiel)->exists()) {
            return redirect()->back()->withErrors('Ce matériel est déjà affecté au cet employé');
        }

        Affectation::create([
            'code_affectation' => Tools::generateAffectationCode(Materiel::find($request->materiel)),
            'matricule_employe' => $request->employe,
            'matricule_materiel' => $request->materiel,
            'date_affectation' => now()
        ]);

        // Update materiel status
        Materiel::find($request->materiel)->update([
            'etat' => MaterielStatus::Affecte
        ]);

        return redirect()->route('affectations.index')->with('success', 'Affectation ajouté avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($code_affectation)
    {
        return view('affectations.edit', [
            'affectation' => Affectation::find($code_affectation),
            'employees' => Employe::all(),
            'materiels' => Materiel::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $code_affectation)
    {
        $affectation = Affectation::find($code_affectation);

        if (Affectation::where('matricule_employe', $request->employe)
            ->where('matricule_materiel', $request->materiel)
            ->whereNot('code_affectation', $affectation->code_affectation)
            ->exists()
        ) {
            return redirect()->back()->withErrors('Ce matériel est déjà affecté au cet employé');
        }

        $request->validate([
            'employe' => 'required|exists:employé,matricule',
            'materiel' => 'required|exists:matériel,matricule',
        ]);

        $affectation->update([
            'matricule_employe' => $request->employe,
            'matricule_materiel' => $request->materiel,
        ]);

        return redirect()->route('affectations.index')->with('success', 'Affectation mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($code_affectation)
    {
        $affectation = Affectation::find($code_affectation);

        // Update materiel status
        $affectation->materiel->update([
            'etat' => MaterielStatus::Non_Affecte
        ]);

        $affectation->delete();

        return redirect()->route('affectations.index')->with('success', 'Affectation supprimé avec succès');
    }
}
