<?php

namespace Database\Seeders;

use App\Models\CommandeProduit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class commande_produitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produits = \App\Models\Produit::all();
        $commandes = \App\Models\Commande::all();

        foreach (range(1, 50) as $index) { // Générer 50 enregistrements par exemple
            $produit = $produits->random();
            $commande = $commandes->random();

            CommandeProduit::create([
                'id_commande' => $commande->id_commande,
                'id_produit' => $produit->id_produit,
                'quantite' => rand(1, 10), // Quantité aléatoire entre 1 et 10
                'prix' => $produit->prix, // Utiliser le prix du produit
            ]);
        }
    }
}
