<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

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


        return redirect()->route('welcome');
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
        // dd($request->all());
        $request->validate([
            'matricule' => 'required|max_digits:4|integer|unique:agent,matricule',
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
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
