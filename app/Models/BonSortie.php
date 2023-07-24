<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonSortie extends BaseModel
{
    use HasFactory;

    protected $table = 'bon_sortie';
    protected $primaryKey = "num_bs";
    protected $guarded = [];

}
