<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonSortie extends Model
{
    use HasFactory;

    protected $table = 'bon_sortie';
    protected $primaryKey = "Num_BS";
}
