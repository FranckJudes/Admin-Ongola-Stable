<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_commande'; // clé primaire définie ici
    protected $keyType = 'string'; // type de clé primaire (string dans ce cas)
    public $incrementing = false;
    protected $fillable = [
        'id_commande',
        'type_livraison',
        'totaux',
        'id_receive_client',
        'id_partenaire',
        'remember_token',
        'livreur_id',
    ];

    public function suivies()
    {
        return $this->hasMany(SuivieLivraison::class, 'id_commande', 'id_commande');
    }

    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class,'id_partenaire');
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
