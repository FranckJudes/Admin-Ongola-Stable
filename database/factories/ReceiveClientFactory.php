<?php

namespace Database\Factories;

use App\Models\ReceiveClient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReceiveClient>
 */
class ReceiveClientFactory extends Factory
{
    protected $model = ReceiveClient::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'adresse' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'cni' => $this->faker->optional()->numerify('########')
        ];
    }
}
