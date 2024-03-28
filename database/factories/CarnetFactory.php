<?php

namespace Database\Factories;

use App\Models\Carnet;
use App\Models\Societe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carnet>
 */
class CarnetFactory extends Factory
{
    protected $model = Carnet::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'type' => $this->faker->word(), // Generate a random word
            'taille' => $this->faker->numberBetween(10, 200000), // Generate a random number between 10 and 200000
            'nomcompte' => $this->word(),
        ];
    }
}
