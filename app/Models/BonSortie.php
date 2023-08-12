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

    /**
     * Get the materiel that owns the BonEntre
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materiel()
    {
        return $this->belongsTo(Materiel::class, 'matricule_materiel');
    }


    /**
     * Get the employe that owns the BonEntre
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'matricule_employe');
    }
}
