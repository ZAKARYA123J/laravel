<?php

namespace Database\Seeders;

use App\Models\Societe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Socket;

class SocieteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Societe::factory()
            ->count(25)
            ->hascomptes(10)
            ->create();

            Societe::factory()
            ->count(100)
            ->hascomptes(10)
            ->create();


            Societe::factory()
            ->count(40)
            ->hascomptes(3)
            ->create();


    }
}
