<?php

namespace Database\Seeders;

use App\Models\Commande;
use App\Models\Livreurs;
use App\Models\Partenaires;
use App\Models\ReceiveClient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Commande::factory(500)->create()->each(function ($commande) {
            $commande->livreur_id = Livreurs::inRandomOrder()->first()->id;
            $commande->id_receive_client = ReceiveClient::inRandomOrder()->first()->id;
            $commande->id_partenaire = Partenaires::inRandomOrder()->first()->id;
            $commande->save();
        });
    }
}
