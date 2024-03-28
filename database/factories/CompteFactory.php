<?php

namespace Database\Factories;

use App\Models\Societe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compte>
 */
class CompteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          
            'Banque'=>$this->faker->company(),
            'Compte'=>$this->faker->numberBetween(10,200000),
            'Ville'=>$this->faker->city(),
            'nomsocietes'=>$this->faker->word(),
            //
        ];
    }
}
