<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends BaseModel
{
    use HasFactory;

    protected $table = 'employé';
    protected $primaryKey = "num_emplye";
    protected $guarded = [];

}
