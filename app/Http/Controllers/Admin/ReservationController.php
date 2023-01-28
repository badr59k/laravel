<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        // récupérer la liste des réservations
        $reservations = Reservation::all();

        // transmission des réservations à la vue
        return view('admin.reservation.index', [
             'reservations' => $reservations
        ]);
    }

    /**
     * Cette méthode affiche un formulaire de création de réservation
     *
     * @return Response
     */
    public function create()
    {
        // valeur par defaut

        // transmission des valeurs par défaut à la vue
        return view('admin.reservation.create', [
            //...
        ]);
    }

    /**
     * Cette méthode enregistre les données d'une nouvelle réservation dans la BDD
     *
     * @return Response
     */
    public function store() 
    {

    }

    /**
     * Affiche un formulaire de modification d'une réservation
     *
     * @param integer $id identifiant de la réservation
     * @return Response
     */
    public function edit(int $id)
    {
        // récupération de la réservation
        $reservation = Reservation::find($id);

        // transmission de la réservation à la vue
        return view ('admin.reservation.edit', [
            'reservation' => $reservation
        ]);
    }

    /**
     * Met à jour les données d'une réservation deja existante dans la BDD
     *
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        
        // dump($request->has('baz'));
        // dump($request->get('baz', 'foo'));
        // dump($request->has('nom'));
        // dump($request->get('nom'));
        // dd($request->all());
        
        $validated = $request->validate([
            'nom' => 'required|min:2|max:100',
            'prenom' => 'required|min:2|max:100',
            'jour' => 'required|date|date_format:Y-m-d|after_or_equal:today',
            'heure' => 'required|date_format:H:i',
            'nombre_personnes' => 'required|numeric|gte:1|lte:20',
            'tel' => 'required|regex:/^[0-9]{2} *[0-9]{2} *[0-9]{2} *[0-9]{2} *[0-9]{2}$/',
            'email' => 'required|email:rfc,dns',
        ]);

        // récupération de la réservation
        $reservation = Reservation::find($id);
        
        $reservation->nom = $request->get('nom');
        $reservation->prenom = $request->get('prenom');
        $reservation->jour = $request->get('jour');
        $reservation->heure = $request->get('heure');
        $reservation->nombre_personnes = $request->get('nombre_personnes');
        $reservation->tel = $request->get('tel');
        $reservation->email = $request->get('email');
        $reservation->save();

        $request->session()->flash('confirmation', 'Vos modifications ont été enrgistrées.');

        return redirect()->route('admin.reservation.edit', ['id' => $reservation->id]);
    }
}
