<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonTransfere extends Model
{
    use HasFactory;

    protected $table = 'bon_transfére';
    protected $primaryKey = "Num_BT";
}
