<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends BaseModel
{
    use HasFactory;

    protected $table = 'structure';
    protected $primaryKey = "num_structure";
    protected $guarded = [];

    /**
     * Get all of the employes for the Structure
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employes()
    {
        return $this->hasMany(Employe::class, 'num_structure');
    }
}
