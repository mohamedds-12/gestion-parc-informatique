<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends BaseModel
{
    use HasFactory;

    protected $table = 'matériel';
    protected $primaryKey = "num_materiel";
    protected $guarded = [];

}
