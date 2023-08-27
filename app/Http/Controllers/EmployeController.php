<?php

namespace App\Http\Controllers;

use App\Helpers\Tools;
use App\Models\Employe;
use App\Models\Structure;
use Illuminate\Http\Request;

class EmployeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Êtes-vous sûrs ?', 'Êtes-vous sûr de vouloir supprimer cet employé ?');
        return view('employees.index', [
            'employees' => Employe::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create', [
            'structures' => Structure::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required||digits:6|numeric',
            'nom' => 'required|max:20',
            'prenom' =>'required|max:20',
            'num_structure' => 'required',
            'num_telephone' => 'regex:/^([0-9]{2}-?){5}$/'
        ]);

        Employe::create([
            'matricule' => $request->matricule,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'num_telephone' => $request->num_telephone,
            'num_structure' => $request->num_structure,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employe creé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employe $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($matricule)
    {
        return view('employees.edit', [
            'employe' => Employe::find($matricule),
            'structures' => Structure::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $matricule)
    {

        $request->validate([
            'nom' => 'required|max:20',
            'prenom' =>'required|max:20',
            'num_structure' => 'required',
            'num_telephone' => 'regex:/^([0-9]{2}-?){5}$/'
        ]);

        Employe::find($matricule)->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'num_telephone' => $request->num_telephone,
            'num_structure' => $request->num_structure,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employe mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($matricule)
    {
        Employe::find($matricule)->delete();
        return redirect()->route('employees.index')->with('success', 'Employe supprimé avec succès');
    }
}
