<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DechargeFournisseur extends BaseModel
{
    use HasFactory;

    protected $table = 'décharge_fournisseur';
    protected $primaryKey = "code_decharge";
    protected $guarded = [];



    /**
     * The materiels that belong to the DechargeFournisseur
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function materiels()
    {
        return $this->belongsToMany(Materiel::class, 'réparer', 'num_materiel', 'Code_decharge');
    }
}
