<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonEntre extends BaseModel
{
    use HasFactory;

    protected $table = 'bon_entre';
    protected $primaryKey = "num_be";
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
     * Get the agent that owns the BonEntre
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'matricule_agent');
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
