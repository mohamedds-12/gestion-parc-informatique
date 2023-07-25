<?php

namespace App\Helpers;


class Tools
{

    public static function generateModelNumber($modelClassPath): int
    {

        do {
            $modelNumber = random_int(100000, 999999);
        } while ($modelClassPath::find($modelNumber) != null);

        return $modelNumber;
    }
}
