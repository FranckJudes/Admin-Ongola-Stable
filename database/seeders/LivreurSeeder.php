<?php

namespace Database\Seeders;

use App\Models\Livreurs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class LivreurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 22; $i++) {
            Livreurs::create([
                'adresse' => $faker->address,
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'photo' => 'photo' . ($i + 1) . '.jpg',
                'telephone' => $faker->phoneNumber,
                'sexe' => $faker->randomElement(['Homme', 'Femme']),
                'password' => Hash::make('password'),
                'photo_permi' => 'permi' . ($i + 1) . '.jpg',
                'situation_matrimoniale' => $faker->randomElement(['Célibataire', 'Marié(e)']),
                'status' => $faker->randomElement(['1', '2']),
            ]);
        }
    }
}
