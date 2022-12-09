<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/hello/{name}', function ($name) {
    // traitement des données
    $name = '"'.$name.'"';

    return view('hello', [
        // passage de variables à une vue
        'name' => $name,
    ]);
})->name('hello');

Route::get('/reservation', function () {
    return view('reservation');
})->name('reservation');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/mentions_legales', function () {
    return view('mentions_legales');
})->name('mentions_legales');