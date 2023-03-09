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
                'chemin' => "img/ambiance/6f760bd2-7463-48d6-be2a-ee7a48bfcc56.jfif",
                'ordre' => '1',
                'legende' => 'ceci est la 1ere image',
            ],
            [
                'chemin' => "img/ambiance/43c17afd-284f-48fc-b35c-8c0e2cf8e464.jfif",
                'ordre' => '2',
                'legende' => 'ceci est la 2eme image',
            ],
            [
                'chemin' => "img/ambiance/bfd37413-91ad-4e1a-b697-f40f3742d99a.jfif",
                'ordre' => '3',
                'legende' => 'ceci est la 3eme image',
            ],
            [
                'chemin' => "img/ambiance/eaf30327-e0ae-4066-8ecc-a5b816344447.jfif",
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
