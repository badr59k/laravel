<?php

use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\CategorieController as AdminCategorieController;
use App\Http\Controllers\Admin\EtiquetteController as AdminEtiquetteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MentionsLegalesController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/hello/{name}', [HelloController::class, 'index'])->name('hello');

Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/mentions_legales', [MentionsLegalesController::class, 'index'] )->name('mentions_legales');

// Routes pour admin reservation
Route::get('/admin/reservation', [AdminReservationController::class, 'index'])->middleware('auth')->name('admin.reservation.index');

Route::get('/admin/reservation/create', [AdminReservationController::class, 'create'])->middleware('auth')->name('admin.reservation.create');
Route::post('/admin/reservation/store', [AdminReservationController::class, 'store'])->middleware('auth')->name('admin.reservation.store');

Route::get('/admin/reservation/{id}/edit', [AdminReservationController::class, 'edit'])->middleware('auth')->name('admin.reservation.edit');
Route::post('/admin/reservation/{id}/update', [AdminReservationController::class, 'update'])->middleware('auth')->name('admin.reservation.update');

// Routes pour admin categorie
Route::get('/admin/categorie', [AdminCategorieController::class, 'index'])->middleware('auth')->name('admin.categorie.index');

Route::get('/admin/categorie/create', [AdminCategorieController::class, 'create'])->middleware('auth')->name('admin.categorie.create');
Route::post('/admin/categorie/store', [AdminCategorieController::class, 'store'])->middleware('auth')->name('admin.categorie.store');

Route::get('/admin/categorie/{id}/edit', [AdminCategorieController::class, 'edit'])->middleware('auth')->name('admin.categorie.edit');
Route::post('/admin/categorie/{id}/update', [AdminCategorieController::class, 'update'])->middleware('auth')->name('admin.categorie.update');

// Routes pour admin Etiquette
Route::get('/admin/etiquette', [AdminEtiquetteController::class, 'index'])->middleware('auth')->name('admin.etiquette.index');

Route::get('/admin/etiquette/create', [AdminEtiquetteController::class, 'create'])->middleware('auth')->name('admin.etiquette.create');
Route::post('/admin/etiquette/store', [AdminEtiquetteController::class, 'store'])->middleware('auth')->name('admin.etiquette.store');

Route::get('/admin/etiquette/{id}/edit', [AdminEtiquetteController::class, 'edit'])->middleware('auth')->name('admin.etiquette.edit');
Route::post('/admin/etiquette/{id}/update', [AdminEtiquetteController::class, 'update'])->middleware('auth')->name('admin.etiquette.update');

// routes de breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';