<?php

namespace App\Http\Controllers;

use App\Models\Employe;
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
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:20',
            'prenom' =>'required|max:20',
            'num_telephone' => 'required'
        ]);

        Employe::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'num_telephone' => $request->num_telephone
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
        $agent = Employe::find($matricule);
        return view('employees.edit', ['agent' => $agent]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $matricule)
    {
        $agent = Employe::find($matricule);

        $request->validate([
            'nom' => 'required|max:20',
            'prenom' => 'required|max:20',
            'email' => ["required", 'email', Rule::unique('agent')->ignore($agent->matricule, 'matricule')],
            'password' => 'confirmed'
        ]);

        $agent->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => $request->has('password')
                        ? Hash::make($request->password)
                        : $agent->password,
        ]);

        return redirect()->route('employees.index')->with('success', 'Employe mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($matricule)
    {
        $agent = Employe::find($matricule)->delete();
        return redirect()->route('employees.index')->with('success', 'Employe supprimé avec succès');
    }
}
