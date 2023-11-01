<?php

namespace App\Helpers;

use App\Models\Affectation;
use App\Models\DechargeFournisseur;
use App\Models\DechargeStructure;

class Tools
{

    public static function generateModelNumber($modelClassPath): int
    {

        do {
            $modelNumber = random_int(100000, 999999);
        } while ($modelClassPath::find($modelNumber) != null);

        return $modelNumber;
    }

    public static function generateAffectationCode(): string
    {
        $lastAffectation = Affectation::latest()->first();
        if ($lastAffectation == null) {
            $codeInteagerPart = '001';
        } else {
            $affectationCodeInt = (int)explode('-', $lastAffectation->code_affectation)[1];
            $codeInteagerPart = str_pad($affectationCodeInt+1, 3, '0', STR_PAD_LEFT);
        }


        $codeAffectation = 'AF' . '-' .
            $codeInteagerPart . '-' .
            now()->month . substr(now()->year, 2, 2);

        return $codeAffectation;
    }

    public static function generateReparationCode(): string
    {
        $lastReparation = DechargeFournisseur::latest()->first();
        if ($lastReparation == null) {
            $codeInteagerPart = '001';
        } else {
            $reparationCodeInt = (int)explode('-', $lastReparation->code_decharge)[1];
            $codeInteagerPart = str_pad($reparationCodeInt+1, 3, '0', STR_PAD_LEFT);
        }


        $codeReparation = 'RP' . '-' .
            $codeInteagerPart . '-' .
            now()->month . substr(now()->year, 2, 2);

        return $codeReparation;
    }

    public static function generateReformationCode(): string
    {
        $lastReformation = DechargeStructure::latest()->first();
        if ($lastReformation == null) {
            $codeInteagerPart = '001';
        } else {
            $reformationCodeInt = (int)explode('-', $lastReformation->code_decharge)[1];
            $codeInteagerPart = str_pad($reformationCodeInt+1, 3, '0', STR_PAD_LEFT);
        }

        $codeReformation = 'RP' . '-' .
            $codeInteagerPart . '-' .
            now()->month . substr(now()->year, 2, 2);

        return $codeReformation;
    }
}
