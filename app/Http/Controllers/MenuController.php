<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();

        // dump and die
        // dd($categories);

        return view('menu', [
            'categories' => $categories,
        ]);
    }
}
