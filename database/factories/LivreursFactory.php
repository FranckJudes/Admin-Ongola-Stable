<?php

namespace Database\Factories;

use App\Models\Livreurs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LivreursFactory extends Factory
{
    protected $model = Livreurs::class;


    public function definition(): array
    {
        return [
            'adresse' => $this->faker->address,
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'photo' => $this->faker->imageUrl(),
            'telephone' => $this->faker->phoneNumber,
            'sexe' => $this->faker->randomElement(['male', 'female']),
            'password' => bcrypt('password'),
            'photo_permi' => $this->faker->imageUrl(),
            'situation_matrimoniale' => $this->faker->randomElement(['single', 'married']),
            'status' => $this->faker->randomElement(['1', '2']),
        ];
    }
}
