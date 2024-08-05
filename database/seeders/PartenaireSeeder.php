<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PartenaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partenaires = [
            [
                'nom' => fake()->company,
                'adresse' => fake()->address,
                'type' => fake()->randomElement(['stocker', 'non-stocker']),
                'cni' => fake()->optional()->numerify('##########'),
                'logo' => fake()->optional()->imageUrl(100, 100),
                'heure_ouverture' => fake()->optional()->time(),
                'heure_fermeture' => fake()->optional()->time(),
                'password' => Hash::make('password'),
                'passwordConfirm' => Hash::make('password'),
                'email' => 'cadrenarthur@gmail.com',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => fake()->company,
                'adresse' => fake()->address,
                'type' => fake()->randomElement(['stocker', 'non-stocker']),
                'cni' => fake()->optional()->numerify('##########'),
                'logo' => fake()->optional()->imageUrl(100, 100),
                'heure_ouverture' => fake()->optional()->time(),
                'heure_fermeture' => fake()->optional()->time(),
                'password' => Hash::make('password'),
                'passwordConfirm' => Hash::make('password'),
                'email' => 'arthur.seumegni@facsciences-uy1.cm',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('partenaires')->insert($partenaires);
    }
}
