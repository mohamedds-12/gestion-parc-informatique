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

    /**
     * Get the employe that owns the Affectation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employe()
    {
        return $this->belongsTo(Employe::class, 'matricule_employe');
    }

    /**
     * Get the materiel that owns the Affectation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materiel()
    {
        return $this->belongsTo(Materiel::class, 'matricule_materiel');
    }
}
