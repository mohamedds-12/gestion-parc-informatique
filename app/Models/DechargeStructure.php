<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DechargeStructure extends BaseModel
{
    use HasFactory;

    protected $table = 'décharge_structure';
    protected $primaryKey = "code_decharge";
    protected $guarded = [];


}
