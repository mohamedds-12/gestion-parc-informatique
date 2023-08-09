<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends BaseModel
{
    use HasFactory;

    protected $table = 'matériel';
    protected $primaryKey = "matricule";
    protected $guarded = [];


    /**
     * The reparations that belong to the Materiel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reparations()
    {
        return $this->belongsToMany(DechargeFournisseur::class, 'réparer', 'matricule_materiel', 'code_decharge');
    }
}
