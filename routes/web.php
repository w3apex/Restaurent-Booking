<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/table/{id}', [FrontendController::class, 'single'])->name('single.table');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(["middleware" => "auth"], function() {
    Route::resource('reservations', ReservationController::class)->except('show');
    Route::resource('bookings', BookingController::class)->except(['show','create']);
});

require __DIR__.'/auth.php';
