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
        $codeAffectation = substr($materiel->matricule, 0, 3) . '-' . now()->year;
        return $codeAffectation;
    }
}
