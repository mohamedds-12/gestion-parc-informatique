<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonEntre extends Model
{
    use HasFactory;

    protected $table = 'bon_entre';
    protected $primaryKey = "Num_BE";
}
