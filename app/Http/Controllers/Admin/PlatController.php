<?php

namespace App\Http\Controllers\Admin;

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
        $categories = Categorie::all();
        $etiquettes = Etiquette::all();
        $photoPlats = PhotoPlat::all();

        return view ('admin.plat.create', [
            'categories' => $categories,
            'etiquettes' => $etiquettes,
            'photoPlats' => $photoPlats,
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
