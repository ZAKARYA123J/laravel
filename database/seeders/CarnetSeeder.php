<?php

namespace Database\Seeders;

use App\Models\Carnet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarnetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Carnet::factory()
        ->count(25)
        ->hascheque(10)
        ->create();

        Carnet::factory()
        ->count(100)
        ->hascheque(10)
        ->create();


        Carnet::factory()
        ->count(40)
        ->hascheque(3)
        ->create();

        //
    }
}
