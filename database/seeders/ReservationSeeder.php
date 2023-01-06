<?php

namespace Database\Seeders;

use Faker;
use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        // 2 réservations avec des données statiques
        
        $reservationDatas = [
            [
                'nom' => 'Foo',
                'prénom' => 'Foo',
                'jour' => '2023-01-06',
                'heure' => '12:00' ,
                'nombre_personnes' => 4,
                'tel' => '0612345678',
                'email' => 'foo.foo@exemple.com'
            ],
            [
                'nom' => 'Bar',
                'prénom' => 'Bar',
                'jour' => '2023-01-13',
                'heure' => '12:00' ,
                'nombre_personnes' => 8,
                'tel' => '0634567812',
                'email' => 'bar.bar@exemple.com'
            ],
        ];

        foreach ($reservationDatas as $reservationData) {
            $reservation = new Reservation();
            $reservation->nom = $reservationData['nom'];
            $reservation->prenom = $reservationData['prénom'];
            $reservation->jour = $reservationData['jour'];
            $reservation->heure = $reservationData['heure'];
            $reservation->nombre_personnes = $reservationData['nombre_personnes'];
            $reservation->tel = $reservationData['tel'];
            $reservation->email = $reservationData['email'];
            $reservation->save();
        }
        
        // 48 réservations avec des données aléatoires
        for ($i = 0; $i < 48; $i++) {
            
            $reservation = new Reservation();
            // nom
            $reservation->nom = $faker->lastName();

            // prénom
            $reservation->prenom = $faker->FirstName();

            // jour
            $reservation->jour = $datetime = $faker->datetimeBetween('-6 months', '+6 months');
            $reservation->jour = $datetime->format('Y-m-d');

            // heure
            $reservation->heure = $faker->time('H:i');

            // le nombre de personne
            // utiliser faker random
            $reservation->nombre_personnes = random_int(1,8);

            //tel
            $reservation->tel = $faker->phoneNumber();

            //email
            $reservation->email = $faker->safeEmail();

            $reservation->save();
        }
    }
}