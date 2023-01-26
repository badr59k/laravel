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
        dd($request->all());
    }
}
