<?php

namespace Database\Seeders;

use App\Models\Commande;
use App\Models\SuivieLivraison;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuivieLivraisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commande::all()->each(function ($commande) {
            SuivieLivraison::factory()->create([
                'id_commande' => $commande->id,
            ]);
        });
    }
}
