<?php

namespace App\Http\Controllers;

use App\Enums\MaterielStatus;
use App\Helpers\Tools;
use App\Models\Materiel;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;

class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Êtes-vous sûrs ?', 'Êtes-vous sûr de vouloir supprimer cet matériel ?');
        return view('materiels.index', [
            'materiels' => Materiel::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materiels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required|max:40',
            'modele' =>'required|max:15',
            'num_serie' => "required|max:25|unique:materiel,num_serie",
            'code_immo' => "required|max:15|unique:materiel,code_immo",
            'reference' => 'required|max:10',
        ]);

        Materiel::create([
            'matricule' => Tools::generateModelNumber(Materiel::class),
            'designation' => $request->designation,
            'num_serie' => $request->num_serie,
            'code_immo' => $request->code_immo,
            'reference' => $request->reference,
            'modele' => $request->modele,
            'etat' => MaterielStatus::Non_Affecte,
        ]);

        return redirect()->route('materiels.index')->with('success', 'Materiel creé avec succès');
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
    public function edit($matricule)
    {
        $materiel = Materiel::find($matricule);
        return view('materiels.edit', [
            'materiel' => $materiel,
            'statuses' => MaterielStatus::casesToArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $matricule)
    {
        $materiel = Materiel::find($matricule);

        $request->validate([
            'designation' => 'required|max:40',
            'modele' =>'required|max:15',
            'num_serie' => ["required", "max:25", ValidationRule::unique('matériel', 'num_serie')->ignore($materiel->matricule, 'matricule')],
            'code_immo' => ["required", "max:15", ValidationRule::unique('matériel', 'code_immo')->ignore($materiel->matricule, 'matricule')],
            'reference' => 'required|max:10',
        ]);

        Materiel::find($matricule)->update([
            'designation' => $request->designation,
            'num_serie' => $request->num_serie,
            'code_immo' => $request->code_immo,
            'reference' => $request->reference,
            'modele' => $request->modele,
            'etat' => $request->etat,
        ]);

        return redirect()->route('materiels.index')->with('success', 'Materiel mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($matricule)
    {
        Materiel::find($matricule)->delete();
        return redirect()->route('materiels.index')->with('success', 'Materiel supprimé avec succès');
    }
}
