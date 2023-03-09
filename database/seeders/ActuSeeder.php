<?php

namespace Database\Seeders;

use Faker;
use App\Models\Actu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        $actuDatas = [
            [
                "jour_publication" => "2023-03-10",
                "heure_publication" => "05:44:00",
                "texte" => "Notre restaurant propose désormais des plats Veggie",
            ],
            [
                "jour_publication" => "2023-03-14",
                "heure_publication" => "22:25:00",
                "texte" => "Un 2ème restaurant O'Cnamo dans ta ville !!! Bientôt",
            ],
            [
                "jour_publication" => "2023-03-16",
                "heure_publication" => "17:12:00",
                "texte" => "O'Cnamo en livraison d'ici mai 2023",
            ],
        ];

        foreach ($actuDatas as $actuData) {
            $actu = new Actu();
            $actu->jour_publication = $actuData['jour_publication'];
            $actu->heure_publication = $actuData['heure_publication'];
            $actu->texte = $actuData['texte'];
            $actu->save();
        }

        for ($i = 0; $i < 0; $i++) {
            $actu = new Actu();

            $actu->jour_publication = $datetime = $faker->datetimeBetween('-6 months', '+6 months');
            $actu->jour_publication = $datetime->format('Y-m-d');

            $actu->heure_publication = $faker->time('H:i');

            $actu->texte = ucfirst($faker ->words(15,true));
            
            $actu->save();
        }
    }
}