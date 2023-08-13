<?php

namespace App\Http\Controllers;

use App\Enums\MaterielStatus;
use App\Helpers\Tools;
use App\Models\BonTransfere;
use App\Models\Materiel;
use Illuminate\Http\Request;

class BonTransfereController extends Controller
{

    protected $sites;

    public function __construct() {
        $this->sites = require(base_path('app/Helpers/Sites.php'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        confirmDelete('Êtes-vous sûrs ?', "Êtes-vous sûr de vouloir supprimer ce bon de transfére ?");
        return view('bons_transfere.index', [
            'bons_transfere' => BonTransfere::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bons_transfere.create', [
            'sites' => $this->sites,
            'materiels' => Materiel::where('etat', MaterielStatus::En_Reformation)->get()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'materiels' => 'array',
            'ancienne_site' => 'required',
            'nouvelle_site' =>'required',
        ]);

        $bon_transfere = BonTransfere::create([
            'num_bt' => Tools::generateModelNumber(BonTransfere::class),
            'ancienne_site' => $request->ancienne_site,
            'nouvelle_site' => $request->nouvelle_site,
            'date_transfere' => now()
        ]);

        foreach ($request->materiels as $materielId) {
            // Attach the materiel to the bon transfere
            Materiel::find($materielId)->update([
                'num_bt' => $bon_transfere->num_bt
            ]);
        }

        return redirect()->route('bons_transfere.index')->with('success', "Bon de transfére creé avec succès");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($num_bt)
    {
        $bon_transfere = BonTransfere::find($num_bt);

        return view('bons_transfere.edit', [
            'bon_transfere' => $bon_transfere,
            'sites' => $this->sites,
            'materiels' => Materiel::where('etat', MaterielStatus::En_Reformation)->get()

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $num_bt)
    {
        $request->validate([
            'materiels' => 'array',
            'ancienne_site' => 'required',
            'nouvelle_site' =>'required',
        ]);

        $bon_transfere = BonTransfere::find($num_bt);

        $bon_transfere->update([
            'ancienne_site' => $request->ancienne_site,
            'nouvelle_site' => $request->nouvelle_site,
        ]);

        foreach ($bon_transfere->materiels as $materiel) {
            if (! in_array($materiel->matricule, $request->materiels)) {
                // detach removed materiels from the bon tansfere
                $materiel->update([
                    'num_bt' => null
                ]);
            }
        }

        foreach ($request->materiels as $materielId) {
            // Attach the materiel to the bon transfere
            Materiel::find($materielId)->update([
                'num_bt' => $bon_transfere->num_bt
            ]);
        }

        return redirect()->route('bons_transfere.index')->with('success', "Bon de transfére mis à jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($num_bt)
    {
        $bon_transfere = BonTransfere::find($num_bt);

        foreach ($bon_transfere->materiels as $materiel) {
            // detach materiels from the bon tansfere
            $materiel->update([
                'num_bt' => null
            ]);
        }
        $bon_transfere->delete();

        return redirect()->route('bons_transfere.index')->with('success', "Bon de transfére supprimé avec succès");
    }
}
