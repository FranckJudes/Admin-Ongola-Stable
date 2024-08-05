<?php

namespace Database\Seeders;

use App\Models\commande;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\suivie_livraison;


class SuivieLivraisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $commandes = commande::all();
        
        foreach(range(1, 10) as $index) {

        suivie_livraison::create([

            'id_suivi' => $index,
            'id_commande' => $commandes->random()->id_commande,
            'status'=> fake()->randomElement(['1','2']),
            'etat' => fake()->randomElement(['1','2','3','4'])
    
        ]);

        }
    }
}
