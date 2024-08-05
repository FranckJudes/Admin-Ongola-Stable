<?php

namespace Database\Seeders;

use App\Models\produit;
use App\Models\partenaire;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // une liste des produits pour tester 
        $nomsProduits = [
            'Télévision', 'Ordinateur Portable', 'Console de Jeux', 'Smartphone', 'Tablette', 'Écran de Moniteur', 
            'Clavier', 'Souris', 'Imprimante', 'Scanner', 'Caméra', 'Haut-parleur', 'Casque', 'Microphone', 
            'Projecteur', 'Disque Dur Externe', 'Clé USB', 'Chargeur', 'Batterie Externe', 'Routeur', 
            'Modem', 'Switch', 'Carte Mémoire', 'Lecteur de Carte', 'Télécommande', 'Adaptateur', 
            'Câble HDMI', 'Câble Ethernet', 'Câble USB', 'Support de Moniteur', 'Station d\'Accueil', 
            'Hub USB', 'Extension de Mémoire', 'Ventilateur de Refroidissement', 'Lampe de Bureau', 
            'Webcam', 'Logiciel de Sécurité', 'Logiciel de Bureautique', 'Antivirus', 'Jeux Vidéo', 
            'Lecteur DVD', 'Lecteur Blu-ray', 'Lecteur MP3', 'Lecteur MP4', 'Lecteur CD', 
            'Station Météo', 'Drone', 'GPS', 'Montre Connectée'
        ];



        $partenaire = partenaire::all();

        // verifier si le partenaire existe 
        
        if ($partenaire->isEmpty()) {
            $this->command->info('aucun produit n existe ');
        }

        // creation d un produit avec des partenaire aleatoirement 

        foreach (range(1, 10) as $index) {
            produit::create([
                'id_produit' => Str::uuid(),
                'id' => $partenaire->random()->id,
                'type' => 'Type example', // Changez cela selon vos besoins
                'nom' => $nomsProduits[array_rand($nomsProduits)],
                'quantite' => fake()->numberBetween(1, 500),
                'prix' => fake()->numberBetween(500, 100500),
                'description' => 'Description for product ' . $index,
                'photo' => fake()->imageUrl(),
            ]);
        }
       
    }
    
}
