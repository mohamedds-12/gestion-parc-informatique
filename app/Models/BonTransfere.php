<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonTransfere extends BaseModel
{
    use HasFactory;

    protected $table = 'bon_transfére';
    protected $primaryKey = "num_btc";
    protected $guarded = [];

}
