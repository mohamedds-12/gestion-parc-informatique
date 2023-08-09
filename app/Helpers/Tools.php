<?php

namespace App\Helpers;

use App\Models\Affectation;

class Tools
{

    public static function generateModelNumber($modelClassPath): int
    {

        do {
            $modelNumber = random_int(100000, 999999);
        } while ($modelClassPath::find($modelNumber) != null);

        return $modelNumber;
    }

    public static function generateAffectationCode($materiel): string
    {
        $codeAffectation = 'AF' . '-' . substr($materiel->matricule, 0, 3) . '-' . now()->year;
        return $codeAffectation;
    }

    public static function generateReparationCode($materiel): string
    {
        $codeAffectation = 'RP' . '-' . substr($materiel->matricule, 0, 3) . '-' . now()->year;
        return $codeAffectation;
    }

    public static function generateReformationCode($materiel): string
    {
        $codeAffectation = 'RF' . '-' . substr($materiel->matricule, 0, 3) . '-' . now()->year;
        return $codeAffectation;
    }
}
