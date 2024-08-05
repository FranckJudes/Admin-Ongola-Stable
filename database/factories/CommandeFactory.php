<?php

namespace Database\Factories;

use App\Models\Commande;
use App\Models\Livreurs;
use App\Models\Partenaires;
use App\Models\ReceiveClient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    protected $model = Commande::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_livraison' => $this->faker->word,
            'totaux' => $this->faker->randomFloat(2, 10, 1000),
            'id_receive_client' => \App\Models\ReceiveClient::inRandomOrder()->first()->id,
            'id_partenaire' => \App\Models\Partenaires::inRandomOrder()->first()->id,
            'livreur_id' => \App\Models\Livreurs::inRandomOrder()->first()->id,
            'reference' => $this->generateReference(),
        ];
    }
    private function generateReference()
    {
        return 'Ref' . $this->faker->numberBetween(10000, 99999);
    }
}
