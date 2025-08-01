<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DealsController;

use App\Http\Controllers\ReservationController;

use App\Http\Controllers\Admin\OfferController;

use App\Http\Controllers\Admin\ReservationController as AdminReservationController;

Route::get('/', function () {
    return view('index');
})->name('Home');

Route::get('/index', function () {
    return view('index');
})->name('index');


Route::get('/Home', function () {
    return view('Home');
})->name('accueil');




Route::get('/deals', [DealsController::class, 'index'])->name('deals');



Route::get('/reservation', function () {
    return view('reservation');
})->name('reservation');


Route::middleware(['auth', 'admin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');





Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('offers', OfferController::class);
});


Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');



Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/reservations', [AdminReservationController::class, 'index'])->name('reservations.index');
});