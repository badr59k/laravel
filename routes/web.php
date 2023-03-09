<?php

use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\CategorieController as AdminCategorieController;
use App\Http\Controllers\Admin\EtiquetteController as AdminEtiquetteController;
use App\Http\Controllers\Admin\RestaurantController as AdminRestaurantController;
use App\Http\Controllers\Admin\ActuController as AdminActuController;
use App\Http\Controllers\Admin\PlatController as AdminPlatController;
use App\Http\Controllers\Admin\PhotoPlatController as AdminPhotoPlatController;
use App\Http\Controllers\Admin\PhotoAmbianceController as AdminPhotoAmbianceController;
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
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');


Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/mentions_legales', [MentionsLegalesController::class, 'index'] )->name('mentions_legales');

// Routes du BACK OFFICE

// CRUD plats
Route::get('/admin/plat', [AdminPlatController::class, 'index'])->middleware('auth')->name('admin.plat.index');

Route::get('/admin/plat/create', [AdminPlatController::class, 'create'])->middleware('auth')->name('admin.plat.create');
Route::post('/admin/plat/', [AdminPlatController::class, 'store'])->middleware('auth')->name('admin.plat.store');

Route::delete('/admin/plat/{id}', [AdminPlatController::class, 'delete'])->middleware('auth')->name('admin.plat.delete');

// CRUD reservation
Route::get('/admin/reservation', [AdminReservationController::class, 'index'])->middleware('auth')->name('admin.reservation.index');

Route::get('/admin/reservation/create', [AdminReservationController::class, 'create'])->middleware('auth')->name('admin.reservation.create');
Route::post('/admin/reservation', [AdminReservationController::class, 'store'])->middleware('auth')->name('admin.reservation.store');

Route::get('/admin/reservation/{id}/edit', [AdminReservationController::class, 'edit'])->middleware('auth')->name('admin.reservation.edit');
Route::put('/admin/reservation/{id}', [AdminReservationController::class, 'update'])->middleware('auth')->name('admin.reservation.update');

Route::delete('/admin/reservation/{id}', [AdminReservationController::class, 'delete'])->middleware('auth')->name('admin.reservation.delete');

// CRUD categorie
Route::get('/admin/categorie', [AdminCategorieController::class, 'index'])->middleware('auth')->name('admin.categorie.index');

Route::get('/admin/categorie/create', [AdminCategorieController::class, 'create'])->middleware('auth')->name('admin.categorie.create');
Route::post('/admin/categorie', [AdminCategorieController::class, 'store'])->middleware('auth')->name('admin.categorie.store');

Route::get('/admin/categorie/{id}/edit', [AdminCategorieController::class, 'edit'])->middleware('auth')->name('admin.categorie.edit');
Route::put('/admin/categorie/{id}', [AdminCategorieController::class, 'update'])->middleware('auth')->name('admin.categorie.update');

Route::delete('/admin/categorie/{id}', [AdminCategorieController::class, 'delete'])->middleware('auth')->name('admin.categorie.delete');

// CRUD Etiquette
Route::get('/admin/etiquette', [AdminEtiquetteController::class, 'index'])->middleware('auth')->name('admin.etiquette.index');

Route::get('/admin/etiquette/create', [AdminEtiquetteController::class, 'create'])->middleware('auth')->name('admin.etiquette.create');
Route::post('/admin/etiquette', [AdminEtiquetteController::class, 'store'])->middleware('auth')->name('admin.etiquette.store');

Route::get('/admin/etiquette/{id}/edit', [AdminEtiquetteController::class, 'edit'])->middleware('auth')->name('admin.etiquette.edit');
Route::put('/admin/etiquette/{id}', [AdminEtiquetteController::class, 'update'])->middleware('auth')->name('admin.etiquette.update');

Route::delete('/admin/etiquette/{id}', [AdminEtiquetteController::class, 'delete'])->middleware('auth')->name('admin.etiquette.delete');

// Routes pour admin Restaurant
Route::get('/admin/restaurant', [AdminRestaurantController::class, 'index'])->middleware('auth')->name('admin.restaurant.index');

Route::get('/admin/restaurant/create', [AdminRestaurantController::class, 'create'])->middleware('auth')->name('admin.restaurant.create');
Route::post('/admin/restaurant', [AdminRestaurantController::class, 'store'])->middleware('auth')->name('admin.restaurant.store');

Route::get('/admin/restaurant/{id}/edit', [AdminRestaurantController::class, 'edit'])->middleware('auth')->name('admin.restaurant.edit');
Route::put('/admin/restaurant/{id}', [AdminRestaurantController::class, 'update'])->middleware('auth')->name('admin.restaurant.update');

Route::delete('/admin/restaurant/{id}', [AdminRestaurantController::class, 'delete'])->middleware('auth')->name('admin.restaurant.delete');

// CRUD Actu
Route::get('/admin/actu', [AdminActuController::class, 'index'])->middleware('auth')->name('admin.actu.index');

Route::get('/admin/actu/create', [AdminActuController::class, 'create'])->middleware('auth')->name('admin.actu.create');
Route::post('/admin/actu', [AdminActuController::class, 'store'])->middleware('auth')->name('admin.actu.store');

Route::get('/admin/actu/{id}/edit', [AdminActuController::class, 'edit'])->middleware('auth')->name('admin.actu.edit');
Route::put('/admin/actu/{id}', [AdminActuController::class, 'update'])->middleware('auth')->name('admin.actu.update');

Route::delete('/admin/actu/{id}', [AdminActuController::class, 'delete'])->middleware('auth')->name('admin.actu.delete');

// CRUD PhotoPlat
Route::get('/admin/photoplat', [AdminPhotoPlatController::class, 'index'])->middleware('auth')->name('admin.photoplat.index');

Route::get('/admin/photoplat/create', [AdminPhotoPlatController::class, 'create'])->middleware('auth')->name('admin.photoplat.create');
Route::post('/admin/photoplat', [AdminPhotoPlatController::class, 'store'])->middleware('auth')->name('admin.photoplat.store');

Route::get('/admin/photoplat/{id}/edit', [AdminPhotoPlatController::class, 'edit'])->middleware('auth')->name('admin.photoplat.edit');
Route::put('/admin/photoplat/{id}', [AdminPhotoPlatController::class, 'update'])->middleware('auth')->name('admin.photoplat.update');

Route::delete('/admin/photoplat/{id}', [AdminPhotoPlatController::class, 'delete'])->middleware('auth')->name('admin.photoplat.delete');

// CRUD PhotoPlat
Route::get('/admin/photoambiance', [AdminPhotoAmbianceController::class, 'index'])->middleware('auth')->name('admin.photoambiance.index');

Route::get('/admin/photoambiance/create', [AdminPhotoAmbianceController::class, 'create'])->middleware('auth')->name('admin.photoambiance.create');
Route::post('/admin/photoambiance', [AdminPhotoAmbianceController::class, 'store'])->middleware('auth')->name('admin.photoambiance.store');

Route::delete('/admin/photoambiance/{id}', [AdminPhotoAmbianceController::class, 'delete'])->middleware('auth')->name('admin.photoambiance.delete');


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