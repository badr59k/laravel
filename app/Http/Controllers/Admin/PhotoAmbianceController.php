<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\PhotoAmbiance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoAmbianceController extends Controller
{
    public function index()
    {
        // Permet de récuperer tout les plats dans la BDD
        $photoAmbiances = PhotoAmbiance::all();

        return view('admin.photoambiance.index', [
            'photoAmbiances' => $photoAmbiances,
        ]);
    }

    public function create()
    {
        $photoAmbiance = new stdClass;
        $photoAmbiance->chemin = 'img/ambiance';
        $photoAmbiance->ordre = '';
        $photoAmbiance->legende = '';

        return view ('admin.photoambiance.create', [
            'photoAmbiance'=> $photoAmbiance,
        ]);
    }

    public function store(Request $request)
    {
        // création d'une photoAmabiance
        $photoAmbiance = new PhotoAmbiance();
        
        $photoAmbiance->chemin = $request->get('chemin');
        $photoAmbiance->ordre = $request->get('ordre');
        $photoAmbiance->legende = $request->get('legende');
        $photoAmbiance->save();

        $request->session()->flash('confirmation', 'La création a été effectuée.');

        return redirect()->route('admin.photoambiance.index');
    }


    public function delete(Request $request, int $id)
    {
        $photoAmbiance = PhotoAmbiance::find($id);

        if (!$photoAmbiance) {
            abort(404);
        }

        $photoPlat->delete();

        $request->session()->flash('confirmation', 'La suppression a bien été enregistré.');

        return redirect()->route('admin.photoambiance.index');
    }
}
