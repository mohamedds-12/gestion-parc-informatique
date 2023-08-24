<?php

namespace App\Enums;

use App\Enums\EnumToArray;

enum MaterielStatus: string
{
    use EnumToArray;

    case Non_Affecte = 'Non Affecté';
    case Affecte = 'Affecté';
    case En_Reparation = 'En Réparation';
    case En_Reformation= 'En Réformation';
}
