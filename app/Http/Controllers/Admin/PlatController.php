<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Etiquette;
use App\Models\PhotoPlat;
use App\Models\Plat;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    public function index()
    {
        // Permet de récuperer tout les plats dans la BDD
        $plats = Plat::all();

        return view('admin.plat.index', [
            'plats' => $plats,
        ]);
    }

    public function create()
    {
        $plat = new stdClass;
        $plat->nom = '';
        $plat->prix= '';
        $plat->description= '';
        $plat->epingle= '';
        $categories = Categorie::all();
        $etiquettes = Etiquette::all();
        $photoPlats = PhotoPlat::all();

        return view ('admin.plat.create', [
            'plat'=> $plat,
            'categories' => $categories,
            'etiquettes' => $etiquettes,
            'photoPlats' => $photoPlats,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        // création d'une plat
        $plat = new Plat();
        
        $plat->nom = $request->get('nom');
        $plat->prix = $request->get('prix');
        $plat->description = $request->get('description');
        $plat->epingle = ($request->get('epingle') == 'on' ? true : false);
        $plat->photo_plat_id = $request->get('photo_plat_id');
        $plat->categorie_id = $request->get('categorie_id');
        // $plat->created_at = "2023-03-06 13:26:30";
        // $plat->updated_at = "2023-03-06 13:26:30";
        $plat->save();

        $request->session()->flash('confirmation', 'La création a été effectuée.');

        return redirect()->route('admin.plat.index');
    }

    public function delete(Request $request, int $id)
    {
        $plat = Plat::find($id);

        if (!$plat) {
            abort(404);
        }

        $plat->delete();

        $request->session()->flash('confirmation', 'La suppression a bien été enregistré.');

        return redirect()->route('admin.plat.index');
    }
}
