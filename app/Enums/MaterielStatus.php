<?php

namespace App\Enums;


enum MaterielStatus: string
{
    case Non_Affecte = 'Non Affecté';
    case Affecte = 'Affecté';
    case En_Reparation = 'En Réparation';
    case En_Reformation= 'En Réformation';
}
