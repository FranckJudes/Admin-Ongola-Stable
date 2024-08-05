<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaires extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'adresse', 'type', 'cni', 'logo', 'heure_ouverture', 'heure_fermeture', 'password', 'email'
    ];

    public function adminstrateurs(){
        return $this->belongsToMany(User::class, 'partenaire_user', 'partenaires_id', 'user_id');

    }
}
