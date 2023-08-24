<?php

namespace App\Enums;


trait EnumToArray
{
    public static function casesToArray(): array
    {
        foreach(self::cases() as $case) {
            $array[$case->value] = $case->name;
        }
        return $array;
    }
}
