<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Agent extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "agent";
    protected $primaryKey = "matricule";
    protected $guarded = [];
    public $timestamps = false;

    /**
     * Get all of the bonsEntre for the Agent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bonsEntre()
    {
        return $this->hasMany(BonEntre::class, 'matricule_agent');
    }
}
