<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\commande;
use App\Models\Livreurs;
use Illuminate\Database\Seeder;
use Database\Seeders\ProduitSeeder;
use Database\Seeders\CommandeSeeder;
use Database\Seeders\PartenaireSeeder;
use Database\Seeders\SuivieLivraisonSeeder;
use Database\Seeders\commande_produitSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        $this->call([
            PartenaireSeeder::class,
            ReceiveClientSeeder::class,
            ProduitSeeder::class,
            UserSeeder::class,
            CommandeSeeder::class,
            commande_produitSeeder::class,
            SuivieLivraisonSeeder::class,
            LivreurSeeder::class,

        ]);
    }
}
