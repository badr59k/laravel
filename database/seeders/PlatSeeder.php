<?php

namespace Database\Seeders;

use Faker;
use App\Models\Categorie;
use App\Models\Etiquette;
use App\Models\PhotoPlat;
use App\Models\Plat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        // toutes les catégories
        // Categorie::all() c'est l'équivalent du SQL 'SELECT * FROM Categorie'
        $categories = Categorie::all();
        // le nombre d'éléments dans la collection
        $categoriesCount = $categories->count();
        // la première catégorie
        $categorieEntree = $categories->first();
        // la deuxième catégorie (id 2, plat)
        $categoriePlat = Categorie::find(2);
        // la troisième catégorie (id 3, dessert)
        $categorieDessert = Categorie::find(3);
        // la quatrième catégorie (id 4, petit dej)
        $categoriePetitDejeuner = Categorie::find(4);
        // la cinquième catégorie (id 5, boisson)
        $categorieBoisson = Categorie::find(5);

        // toutes les étiquettes
        $etiquettes = Etiquette::all();
        // le nombre d'éléments dans la collection
        $etiquettesCount = $etiquettes->count();

        $etiquetteVegetarien = Etiquette::find(1);
        $etiquettePoisson = Etiquette::find(2);
        $etiquetteBoeuf = Etiquette::find(3);
        $etiquettePoulet = Etiquette::find(4);
        $etiquetteAgneau = Etiquette::find(5);

        $etiquetteIds = $etiquettes->modelKeys();
        
        // toutes les photos
        $photos = PhotoPlat::all();
        // la première photo
        $photo = $photos->first();

        $platDatas = [
            [
                'nom' => 'Pates',
                'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.',
                'prix'=> 23.14,
                'epingle' => true,
                'photo_plat_id' => $photo-> id,
                'categorie_id' => $categorieEntree->id,
                'etiquettes' => [
                    $etiquetteVegetarien,
                    $etiquettePoisson,
                ],
            ],
            [
                'nom' => 'Pizza',
                'description' => 'Lorem ipsum dolor',
                'prix'=> 15,
                'epingle' => false,
                'photo_plat_id' => $photo-> id,
                'categorie_id' => $categoriePlat->id,
                'etiquettes' => [
                    $etiquetteBoeuf,
                    $etiquettePoulet,
                ],
            ],
            [
                'nom' => 'Sushi',
                'description' => 'Lorem ipsum dolor sit amet.',
                'prix'=> 18,
                'epingle' => false,
                'photo_plat_id' => $photo-> id,
                'categorie_id' => $categorieDessert->id,
                'etiquettes'=> [    
                    $etiquetteAgneau,
                ],
            ],
        ];

        foreach ($platDatas as $platData) {
            $plat = new Plat();
            $plat->nom = $platData['nom'];
            $plat->description = $platData['description'];
            $plat->prix = $platData['prix'];
            $plat->epingle = $platData['epingle'];
            $plat->photo_plat_id = $platData['photo_plat_id'];
            $plat->categorie_id = $platData['categorie_id'];
            $plat->save();
            
            foreach($platData['etiquettes'] as $etiquette) {
                $plat->etiquettes()->attach($etiquette->id);
            }

        }

        for ($i = 0; $i < 30; $i++){

            $plat = new Plat();

            $plat->nom = $faker->words(2, true);

            $plat->description = $faker->words(10, true);

            $plat->prix = random_int(100,1000)/100;
            // équivalent de la ligne du dessus mais avec Faker
            // $plat->prix = $faker->randomFloat(2, 1, 50);

            //le statut épinglé est aléatoire, 0 == false, 1 == true
            $plat->epingle = (bool) random_int(0, 1);

            // affectation d'une photo
            $plat->photo_plat_id= random_int(1, 5);

            // affectation d'une catégorie
            // la catégorie est choisie au hasard
            // un nombre aléatoire est tiré entre 0 et 5-1 (donc 4)
            $categorieIndex = random_int(0, $categoriesCount - 1);
            // on utilise le nombre tiré au hasard pour accéder au Nième éléments de la collection de catégories
            $categorie = $categories->get($categorieIndex);
            $plat->categorie_id = $categorie->id;

            $plat->save();

            //association d'étiquettes au plat
            $count = random_int(1, 5);
            $shortList = $faker->randomElements($etiquetteIds, $count);
            $plat->etiquettes()->attach($shortList);
        }
    }
}
