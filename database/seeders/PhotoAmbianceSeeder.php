<?php

namespace Database\Seeders;

use App\Models\PhotoAmbiance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoAmbianceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photoAmbianceDatas = [
            [
                'chemin' => "img/clem-onojeghuo-zlABb6Gke24-unsplash.jpg",
                'ordre' => '1',
                'legende' => 'ceci est la 1ere image',
            ],
            [
                'chemin' => "img/Cuisinier.jpg",
                'ordre' => '2',
                'legende' => 'ceci est la 2eme image',
            ],
            [
                'chemin' => "img/Image restaurant.jpg",
                'ordre' => '3',
                'legende' => 'ceci est la 3eme image',
            ],
            [
                'chemin' => "img/jay-wennington-N_Y88TWmGwA-unsplash.jpg",
                'ordre' => '4',
                'legende' => 'ceci est la 4eme image',
            ],
        ];

        foreach($photoAmbianceDatas as $photoAmbianceData) {
            // création d'une nouvelle photo
            $photoAmbiance = new PhotoAmbiance();
            // sélection d'un fichier jpg
            $photoAmbiance->chemin = $photoAmbianceData['chemin'];
            $photoAmbiance->ordre =$photoAmbianceData['ordre'];
            $photoAmbiance->legende =$photoAmbianceData['legende'];
            // sauvegarde dans la BDD
            $photoAmbiance->save(); 
        }
    }
}
