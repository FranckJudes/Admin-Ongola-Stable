<?php

namespace Database\Seeders;

use App\Models\partenaire;
use Illuminate\Support\Str;
use App\Models\ReceiveClient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    // Récupérer les données des partenaires et clients
    $partenaires = partenaire::pluck('id'); // Assurez-vous de récupérer les IDs des partenaires
    $clients = ReceiveClient::pluck('id'); // Assurez-vous de récupérer les IDs des clients

    // Vérifier si les collections ne sont pas vides
    if ($partenaires->isEmpty() || $clients->isEmpty()) {
        throw new \Exception('Les tables partenaires ou clients sont vides. Assurez-vous qu\'elles contiennent des données.');
    }

    // Liste des types de livraison possibles
    $typesLivraison = ['standard', 'vip', 'express', 'classic', 'premium'];

    foreach (range(1, 10) as $index) {
        \App\Models\commande::create([
            'id_commande' => Str::uuid()->toString(), // Génération d'un UUID unique
            'id_partenaire' => $partenaires->random(), // Obtenir un ID aléatoire parmi les partenaires
            'type_livraison' => $typesLivraison[array_rand($typesLivraison)], // Choisir un type de livraison aléatoire
            'elementColis' => 'Colis ' . $index . ' contenant des produits divers', // Exemple de texte pour elementColis
            'totaux' => rand(1000, 5000), // Montant total aléatoire
            'heuredelivraison' => now()->addHours(rand(1, 24))->format('H:i:s'), // Heure de livraison aléatoire
            'id_receive_client' => $clients->random(), // Obtenir un ID aléatoire parmi les clients
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

}
