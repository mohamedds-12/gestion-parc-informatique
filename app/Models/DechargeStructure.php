<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DechargeStructure extends Model
{
    use HasFactory;

    protected $table = 'décharge_structure';
    protected $primaryKey = "Code_décharge";

}
