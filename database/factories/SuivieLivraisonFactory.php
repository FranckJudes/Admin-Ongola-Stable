<?php

namespace Database\Factories;

use App\Models\Commande;
use App\Models\SuivieLivraison;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SuivieLivraison>
 */
class SuivieLivraisonFactory extends Factory
{
    protected $model = SuivieLivraison::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_suivi' => $this->faker->uuid,
            'id_commande' => Commande::factory(),
            'status' => $this->faker->randomElement(['1', '2']),
            'etat' => $this->faker->randomElement(['1', '2', '3', '4']),
        ];
    }
}
