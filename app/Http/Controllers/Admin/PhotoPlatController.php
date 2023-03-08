<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\PhotoPlat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoPlatController extends Controller
{
    public function index()
    {
        // Permet de récuperer tout les plats dans la BDD
        $photoPlats = PhotoPlat::all();

        return view('admin.photoplat.index', [
            'photoPlats' => $photoPlats,
        ]);
    }

    public function create()
    {
        $photoPlat = new stdClass;
        $photoPlat->chemin = 'img/plats';

        return view ('admin.photoplat.create', [
            'photoPlat'=> $photoPlat,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        // création d'une plat
        $photoPlat = new PhotoPlat();
        
        $photoPlat->chemin = $request->get('chemin');
        $photoPlat->save();

        $request->session()->flash('confirmation', 'La création a été effectuée.');

        return redirect()->route('admin.photoplat.index');
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
        $photoPlat = PhotoPlat::find($id);

        // transmission de la catégorie à la vue
        return view ('admin.photoplat.edit', [
            'photoPlat' => $photoPlat
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
            'chemin' => 'required|min:2|max:100|',
        ]);

        $photoPlat = PhotoPlat::find($id);
        
        $photoPlat->chemin= $request->get('chemin');
        $photoPlat->save();

        $request->session()->flash('confirmation', 'Vos modifications ont été enrgistrées.');

        return redirect()->route('admin.photoplat.edit', ['id' => $photoPlat->id]);
    }

    public function delete(Request $request, int $id)
    {
        $photoPlat = PhotoPlat::find($id);

        if (!$photoPlat) {
            abort(404);
        }

        $photoPlat->delete();

        $request->session()->flash('confirmation', 'La suppression a bien été enregistré.');

        return redirect()->route('admin.photoplat.index');
    }
}
