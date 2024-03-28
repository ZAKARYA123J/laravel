<?php

namespace Database\Factories;

use App\Models\Carnet;
use App\Models\Cheque;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cheque>
 */
class ChequeFactory extends Factory
{
    protected $model = Cheque::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'beneficiaire'=>$this->faker->name(),
            'montant'=>$this->faker->numberBetween(10, 200000),
            'facture'=>$this->faker->word(),
            'nomcarnet'=>$this->faker->word(),
            //_
        ];
    }
}
