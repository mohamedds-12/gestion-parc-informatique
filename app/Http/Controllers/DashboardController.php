<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\DechargeFournisseur;
use App\Models\DechargeStructure;
use App\Models\Materiel;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard', [
            'materiels' => Materiel::count(),
            'affectations' => Affectation::count(),
            'reparations' => DechargeFournisseur::count(),
            'reformations' => DechargeStructure::count(),
        ]);
    }
}
