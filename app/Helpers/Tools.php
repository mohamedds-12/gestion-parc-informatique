<?php

namespace App\Helpers;


class Tools
{

    public static function generateModelNumber($modelClassPath): int
    {

        do {
            $modelNumber = random_int(1000, 9999);
        } while ($modelClassPath::find($modelNumber) != null);

        return $modelNumber;
    }
}
