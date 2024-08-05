<?php

namespace Database\Factories;

use App\Models\Partenaires;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partenaires>
 */
class PartenairesFactory extends Factory
{
    protected $model = Partenaires::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->company,
            'adresse' => $this->faker->address,
            'type' => $this->faker->randomElement(['Type1', 'Type2', 'Type3']),
            'cni' => $this->faker->optional()->numerify('########'),
            'logo' => $this->faker->optional()->imageUrl(),
            'heure_ouverture' => $this->faker->optional()->time(),
            'heure_fermeture' => $this->faker->optional()->time(),
            'password' => bcrypt('password'), // ou Str::random(10) pour un mot de passe aléatoire
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
