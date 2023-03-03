<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Actu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActuController extends Controller
{
    public function index() {

        // récupérer la liste des informations du actu
        $actus = Actu::all();
    
        // transmission des informations du actu à la vue
        return view('admin.actu.index', [
        'actus' => $actus
        ]);
    }
        /**
     * Cette méthode affiche un formulaire de création d'actualités
     *
     * @return Response
     */
    public function create()
    {
        // valeur par defaut
        $actu = new stdClass;

        $actu->jour_publication = '';
        $actu->heure_publication= '12:00';
        $actu->texte = '';


        // transmission des valeurs par défaut à la vue
        return view('admin.actu.create', [
            'actu' => $actu,
        ]);
    }

    /**
     * Cette méthode enregistre les données d'une nouvelle information sur le actu dans la BDD
     *
     * @return Response
     */
    public function store(Request $request) 
    {
        $validated = $request->validate([
            'jour_publication' => 'required|date|date_format:Y-m-d',
            'heure_publication' => 'required',
            'texte' => 'required|min:2|max:100',
        ]);

        // création d'une actu
        $actu = new Actu();
               
        $actu->jour_publication = $request->get('jour_publication');
        $actu->heure_publication = $request->get('heure_publication');
        $actu->texte = $request->get('texte');
        $actu->save();

        $request->session()->flash('confirmation', 'La création a été effectuée.');

        return redirect()->route('admin.actu.index');

    }
    /**
     * Affiche un formulaire de modification d'une information sur le actu
     *
     * @param integer $id identifiant d'information sur le actu
     * @return Response
     */
    public function edit(int $id)
    {
        // récupération de l'information sur le actu
        $actu = Actu::find($id);

        // transmission de l'information sur le actu à la vue
        return view ('admin.actu.edit', [
            'actu' => $actu
        ]);
    }

    /**
     * Met à jour les données d'une information sur les actualités deja existante dans la BDD
     *
     * @return Response
     */
    public function update(Request $request, int $id)
    {   
        $validated = $request->validate([
            'jour_publication' => 'required|date|date_format:Y-m-d|',
            'heure_publication' => 'required|',
            'texte' => 'required|min:2',
        ]);

        $actu = Actu::find($id);
        
        $actu->jour_publication = $request->get('jour_publication');
        $actu->heure_publication = $request->get('heure_publication');
        $actu->texte = $request->get('texte');
        $actu->save();

        $request->session()->flash('confirmation', 'Vos modifications ont été enrgistrées.');

        return redirect()->route('admin.actu.edit', ['id' => $actu->id]);
    }
}
