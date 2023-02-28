<?php

namespace App\Http\Controllers;

use App\Models\Actu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $actus = Actu::all();

        return view('home', [
            'actus' => $actus,
        ]);
    }
}
