<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends BaseModel
{
    use HasFactory;

    protected $table = 'structure';
    protected $primaryKey = "num_structure";
    protected $guarded = [];

}
