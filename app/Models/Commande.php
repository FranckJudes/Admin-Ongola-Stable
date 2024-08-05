<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_livraison',
        'totaux',
        'id_receive_client',
        'id_partenaire',
        'remember_token',
        'livreur_id',
    ];

    public function suivies()
    {
        return $this->hasMany(SuivieLivraison::class, 'id_commande', 'id');
    }

    public function partenaire()
    {
        return $this->belongsTo(Partenaires::class,'id_partenaire');
    }
    public function receive_client()
    {
        return $this->belongsTo(ReceiveClient::class,'id_partenaire');
    }
    public function livreurs()
    {
        return $this->belongsTo(Livreurs::class,'livreur_id');
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'commande_produit')
                    ->withPivot('quantite')
                    ->withTimestamps();
    }
}
