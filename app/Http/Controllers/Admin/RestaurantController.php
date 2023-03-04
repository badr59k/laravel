<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index() {

        // récupérer la liste des informations du restaurant
        $restaurants = Restaurant::all();
    
        // transmission des informations du restaurant à la vue
        return view('admin.restaurant.index', [
        'restaurants' => $restaurants
        ]);
    }
    /**
     * Cette méthode affiche un formulaire de création d'information sur le restaurant
     *
     * @return Response
     */
    public function create()
    {
        // valeur par defaut
        $restaurant = new stdClass;

        $restaurant->cle = '';
        $restaurant->valeur= '';

        // transmission des valeurs par défaut à la vue
        return view('admin.restaurant.create', [
            'restaurant' => $restaurant,
        ]);
    }

    /**
     * Cette méthode enregistre les données d'une nouvelle information sur le restaurant dans la BDD
     *
     * @return Response
     */
    public function store(Request $request) 
    {
        $validated = $request->validate([
            'cle' => 'required|min:2|max:100',
            'valeur' => 'required|min:2|max:100',
        ]);

        // création d'une restaurant
        $restaurant = new restaurant();
               
        $restaurant->cle = $request->get('cle');
        $restaurant->cle = $request->get('valeur');
        $restaurant->save();

        $request->session()->flash('confirmation', 'La création a été effectuée.');

        return redirect()->route('admin.restaurant.index');
    }

    /**
     * Affiche un formulaire de modification d'une information sur le restaurant
     *
     * @param integer $id identifiant d'information sur le restaurant
     * @return Response
     */
    public function edit(int $id)
    {
        // récupération de l'information sur le restaurant
        $restaurant = Restaurant::find($id);

        // transmission de l'information sur le restaurant à la vue
        return view ('admin.restaurant.edit', [
            'restaurant' => $restaurant
        ]);
    }

    /**
     * Met à jour les données d'une information sur le restaurant deja existante dans la BDD
     *
     * @return Response
     */
    public function update(Request $request, int $id)
    {   
        $validated = $request->validate([
            // 'cle' => 'required|min:2|max:100|',
            'valeur' => 'required|min:2|max:100',
        // récupération de l'information sur le restaurant
        ]);

        $restaurant = Restaurant::find($id);
        
        // $restaurant->cle = $request->get('cle');
        $restaurant->valeur = $request->get('valeur');
        $restaurant->save();

        $request->session()->flash('confirmation', 'Vos modifications ont été enrgistrées.');

        return redirect()->route('admin.restaurant.edit', ['id' => $restaurant->id]);
    }
}
