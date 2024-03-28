<?php

namespace Database\Factories;

use App\Models\Societe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Societe>
 */
class SocieteFactory extends Factory
{
    protected $model= Societe::class;
    /**
     * Define the model's default state.
     * 
    
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $Nomsociete=$this->faker->company();
        return [
            'Nomsociete'=>$Nomsociete,
            //
        ];
    }
}
