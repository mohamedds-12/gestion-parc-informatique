<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends BaseModel
{
    use HasFactory;

    protected $table = "affectation";
    protected $primaryKey = "code_affectation";
    protected $guarded = [];

}
