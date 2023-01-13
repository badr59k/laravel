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
        ->get()
        ->first()
        ;
        $tel = DB::table('restaurant')
        ->where('cle', '=', 'tel')
        ->get()
        ->first()
        ;

        return view('contact', [
            'adresse' => $adresse->valeur,
            'tel' => $tel->valeur,
        ]);
    }
}
