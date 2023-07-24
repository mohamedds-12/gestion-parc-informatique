<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends BaseModel
{
    use HasFactory;

    protected $table = 'fournisseur';
    protected $primaryKey = "num_fournisseur";
    protected $guarded = [];

}
