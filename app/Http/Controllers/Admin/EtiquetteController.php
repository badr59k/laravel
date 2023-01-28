<?php

namespace App\Http\Controllers\Admin;

use App\Models\Etiquette;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtiquetteController extends Controller
{
    public function index() {

        // récupérer la liste des catégories
        $etiquettes = Etiquette::all();
    
        // transmission des réservations à la vue
        return view('admin.etiquette.index', [
        'etiquettes' => $etiquettes
        ]);
    }
    /**
     * Cette méthode affiche un formulaire de création d'étiquette
     *
     * @return Response
     */
    public function create()
    {
        // valeur par defaut

        // transmission des valeurs par défaut à la vue
        return view('admin.etiquette.create', [
            //...
        ]);
    }

    /**
     * Cette méthode enregistre les données d'une nouvelle etiquette dans la BDD
     *
     * @return Response
     */
    public function store() 
    {

    }

    /**
     * Affiche un formulaire de modification d'une etiquette
     *
     * @param integer $id identifiant de la etiquette
     * @return Response
     */
    public function edit(int $id)
    {
        // récupération de la etiquette
        $etiquette = Etiquette::find($id);

        // transmission de la catégorie à la vue
        return view ('admin.etiquette.edit', [
            'etiquette' => $etiquette
        ]);
    }

    /**
     * Met à jour les données d'une étiquette deja existante dans la BDD
     *
     * @return Response
     */
    public function update(Request $request, int $id)
    {   
        $validated = $request->validate([
            'nom' => 'required|min:2|max:100|unique:etiquette,nom',
            'description' => 'required|min:2|max:100',
        // récupération de l'étiquette
        ]);

        $etiquette = Etiquette::find($id);
        
        $etiquette->nom = $request->get('nom');
        $etiquette->description = $request->get('description');
        $etiquette->save();

        $request->session()->flash('confirmation', 'Vos modifications ont été enrgistrées.');

        return redirect()->route('admin.etiquette.edit', ['id' => $etiquette->id]);
    }
}


