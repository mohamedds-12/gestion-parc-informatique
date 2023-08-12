<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonTransfere extends BaseModel
{
    use HasFactory;

    protected $table = 'bon_transfére';
    protected $primaryKey = "num_bt";
    protected $guarded = [];


    /**
     * Get all of the materiels for the BonTransfere
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materiels()
    {
        return $this->hasMany(Materiel::class, 'num_bt');
    }
}
