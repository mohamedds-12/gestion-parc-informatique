<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DechargeFournisseur extends Model
{
    use HasFactory;

    protected $table = 'décharge_fournisseur';
    protected $primaryKey = "Code_décharge";


    /**
     * The materiels that belong to the DechargeFournisseur
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function materiels()
    {
        return $this->belongsToMany(Materiel::class, 'réparer', 'Num_matériel', 'Code_décharge');
    }
}
