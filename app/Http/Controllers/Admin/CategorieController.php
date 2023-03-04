<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index() {

        // récupérer la liste des catégories
        $categories = Categorie::all();
    
        // transmission des réservations à la vue
        return view('admin.categorie.index', [
        'categories' => $categories
        ]);
    }
        /**
     * Cette méthode affiche un formulaire de création de catégorie
     *
     * @return Response
     */
    public function create()
    {
        // valeur par defaut
        $categorie = new stdClass;

        $categorie->nom = '';
        $categorie->description= '';

        // transmission des valeurs par défaut à la vue
        return view('admin.categorie.create', [
            'categorie' => $categorie,
        ]);
    }

    /**
     * Cette méthode enregistre les données d'une nouvelle catégorie dans la BDD
     *
     * @return Response
     */
    public function store(Request $request) 
    {
        $validated = $request->validate([
            'nom' => 'required|min:2|max:100',
            'description' => 'required|min:2|max:100',
        ]);

        // création d'une categorie
        $categorie = new categorie();
               
        $categorie->nom = $request->get('nom');
        $categorie->description = $request->get('description');
        $categorie->save();

        $request->session()->flash('confirmation', 'La création a été effectuée.');

        return redirect()->route('admin.categorie.index');
    }

    /**
     * Affiche un formulaire de modification d'une catégorie
     *
     * @param integer $id identifiant de la catégorie
     * @return Response
     */
    public function edit(int $id)
    {
        // récupération de la catégorie
        $categorie = Categorie::find($id);

        // transmission de la catégorie à la vue
        return view ('admin.categorie.edit', [
            'categorie' => $categorie
        ]);
    }

    /**
     * Met à jour les données d'une catégorie deja existante dans la BDD
     *
     * @return Response
     */
    public function update(Request $request, int $id)
    {   
        $validated = $request->validate([
            'nom' => 'required|min:2|max:100|unique:categorie,nom',
            'description' => 'required|min:2|max:100',
        // récupération de la réservation
        ]);

        $categorie = Categorie::find($id);
        
        $categorie->nom = $request->get('nom');
        $categorie->description = $request->get('description');
        $categorie->save();

        $request->session()->flash('confirmation', 'Vos modifications ont été enrgistrées.');

        return redirect()->route('admin.categorie.edit', ['id' => $categorie->id]);
    }

    public function delete(Request $request, int $id)
    {
        $categorie = Categorie::find($id);

        if (!$categorie) {
            abort(404);
        }

        $categorie->delete();

        $request->session()->flash('confirmation', 'La suppression a bien été enregistré.');

        return redirect()->route('admin.categorie.index');
    }
}
