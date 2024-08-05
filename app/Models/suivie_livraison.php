<?php

namespace App\Models;

use App\Models\commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class suivie_livraison extends Model
{
    use HasFactory;

    protected $table = 'suivie_livraisons';

    protected $fillable = [
        'id_suivi',
        'id_commande',
        'status',
        'etat',
    ];

    public function commande()
    {
        return $this->belongsTo(commande::class, 'id_commande','id_commande');
    }
}
