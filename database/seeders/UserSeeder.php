<?php

namespace Database\Seeders;

use App\Models\User; // Assurez-vous que le modèle User est importé
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créez un utilisateur administrateur
        User::create([
            'name' => 'Admin',
            'lastname' => 'User',
            'email' => 'admin@example.com',
            'sexe' => 'M',
            'type' => '1',
            'photo' => 'default.png',
            'telephone' => '123-456-7890',
            'password' => Hash::make('password'), // Mot de passe par défaut
        ]);

        // Créez quelques utilisateurs avec des données aléatoires
        foreach (range(1, 10) as $index) {
            User::create([
                'name' => 'User' . $index,
                'lastname' => 'LastName' . $index,
                'email' => 'user' . $index . '@example.com',
                'sexe' => $index % 2 == 0 ? 'M' : 'F',
                'type' => '2',
                'photo' => 'default.png',
                'telephone' => '123-456-789' . $index,
                'password' => Hash::make('password'), // Mot de passe par défaut
            ]);
        }
    }
}
