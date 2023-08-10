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


    /**
     * Get all of the materiels for the DechargeStructure
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materiels()
    {
        return $this->hasMany(Materiel::class, 'code_decharge_structure');
    }

    /**
     * Get the employe that owns the DechargeStructure
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'matricule_employe');
    }
}
