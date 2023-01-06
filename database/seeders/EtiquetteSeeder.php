<?php

namespace Database\Seeders;

use Faker;
use App\Models\Etiquette;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtiquetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 15; $i++) {
            $etiquette = new Etiquette();
            $etiquette->nom = $faker->words(1, true);
            $etiquette->description = $faker->words(10, true);
            $etiquette->save();
        }
    }
}
