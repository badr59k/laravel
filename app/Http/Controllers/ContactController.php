<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $adresse = DB::table('restaurant')
        ->where('cle', '=', 'adresse')
        ->first()
        ;
        $tel = DB::table('restaurant')
        ->where('cle', '=', 'tel')
        ->first()
        ;
        $map = DB::table('restaurant')
        ->where('cle', '=', 'map')
        ->first()
        ;
        $horaire = DB::table('restaurant')
        ->where('cle', '=', 'horaire')
        ->first()
        ;

        return view('contact', [
            'adresse' => $adresse->valeur,
            'tel' => $tel->valeur,
            'map' => $map->valeur,
            'horaire' => $horaire->valeur,
        ]);
    }
}
