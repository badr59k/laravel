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
                "jour_publication" => "2023-02-10",
                "heure_publication" => "05:44:00",
                "texte" => "Ceci est la 1ère actualité",
            ],
            [
                "jour_publication" => "2023-02-14",
                "heure_publication" => "22:25:00",
                "texte" => "Ceci est la 2ème actualité",
            ],
            [
                "jour_publication" => "2023-02-16",
                "heure_publication" => "17:12:00",
                "texte" => "Ceci est la 3ème actualité",
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