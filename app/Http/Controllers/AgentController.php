<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;

class AgentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:agent,email',
            'password' => 'required'
        ]);

        $agent = Agent::where('email', $request->email)->first();

        if (! Hash::check($request->password, $agent->password) ) {
            return redirect()->back()->withErrors([
                'email' => "Aucun agent possédant ces informations d'identification n'a été trouvé."
            ]);

        } else {
            Auth::login($agent);
        }


        return redirect()->route('dashboard');
    }


    /**
     * Display a listing of the resource.
     */
    public function logout()
    {
        Auth::logout();
        return view('welcome');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Êtes-vous sûrs ?', 'Êtes-vous sûr de vouloir supprimer cet agent ?');
        return view('agents.index', [
            'agents' => Agent::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required|integer|unique:agent,matricule',
            'nom' => 'required|max:20',
            'prenom' =>'required|max:20',
            'email' =>'required|email|unique:agent,email',
            'password' => 'required|confirmed'
        ]);

        Agent::create([
            'matricule' => $request->matricule,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('agents.index')->with('success', 'Agent creé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($matricule)
    {
        $agent = Agent::find($matricule);
        return view('agents.edit', ['agent' => $agent]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $matricule)
    {
        $agent = Agent::find($matricule);

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

        return redirect()->route('agents.index')->with('success', 'Agent mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($matricule)
    {
        $agent = Agent::find($matricule);
        // if ($agent->bonsEntre->isNotEmpty()) {
        //     alert()->error("Échec de la suppression de l'agent !", "L'agent est utilisé par des bons d'entré")->persistent();
        //     return redirect()->back();
        // }

        $agent->delete();

        return redirect()->route('agents.index')->with('success', 'Agent supprimé avec succès');
    }
}
