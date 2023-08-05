<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends BaseModel
{
    use HasFactory;

    protected $table = 'employé';
    protected $primaryKey = "matricule";
    protected $guarded = [];


    /**
     * Get the structure that owns the Employe
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function structure()
    {
        return $this->belongsTo(Structure::class, 'num_structure');
    }
}
