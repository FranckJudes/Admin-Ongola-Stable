<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuivieLivraison extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_suivi';
    public $incrementing = false;

    protected $fillable = [
        'id_suivi',
        'id_commande',
        'status',
        'etat'
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'id_commande', 'id');
    }
}
