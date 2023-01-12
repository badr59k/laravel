<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index()
    {
        //SELECT * FROM categorie
        $categories = Categorie::all();

        // SELECT * FROM categorie ORDER BY id ASC
        // $categories = DB::table('categorie')
        // ->orderBy('id', 'asc')
        // ->get()
        // ;

        return view('menu', [
            'categories' => $categories,
        ]);
    }
}
