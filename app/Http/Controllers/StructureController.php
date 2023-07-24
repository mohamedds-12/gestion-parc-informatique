<?php

namespace App\Http\Controllers;

use App\Helpers\Tools;
use App\Models\Structure;
use Illuminate\Http\Request;

class StructureController extends Controller
{
    protected $wilayas;

    public function __construct() {
        $this->wilayas = require(base_path('app/helpers/wilayas.php'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Êtes-vous sûrs ?', 'Êtes-vous sûr de vouloir supprimer cet structure ?');

        return view('structures.index', [
            'structures' => Structure::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('structures.create', [
            'wilayas' => $this->wilayas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required|max:12',
            'designation_site' =>'required|max:40',
            'wilaya' => 'required'
        ]);

        Structure::create([
            'num_structure' => Tools::generateModelNumber(Structure::class),
            'designation' => $request->designation,
            'designation_site' => $request->designation_site,
            'wilaya' => $request->wilaya
        ]);

        return redirect()->route('structures.index')->with('success', 'Structure creé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Structure $structure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($num_structure)
    {
        return view('structures.edit', [
            'structure' => Structure::find($num_structure),
            'wilayas' => $this->wilayas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $num_structure)
    {
        $structure = Structure::find($num_structure);

        $request->validate([
            'designation' => 'required|max:12',
            'designation_site' =>'required|max:40',
            'wilaya' => 'required'
        ]);

        $structure->update([
            'designation' => $request->designation,
            'designation_site' => $request->designation_site,
            'wilaya' => $request->wilaya
        ]);

        return redirect()->route('structures.index')->with('success', 'Structure mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($num_structure)
    {
        Structure::find($num_structure)->delete();
        return redirect()->route('structures.index')->with('success', 'Structure supprimé avec succès');
    }
}
