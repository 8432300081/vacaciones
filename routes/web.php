<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacacionesController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AdminController;


// Página principal
Route::get('/', [VacacionesController::class, 'index'])->name('vacaciones');

// Procesar reserva
Route::post('/reservar', [ReservaController::class, 'store'])->name('reservar');

// Login Admin
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// Vista de reservas (protegida manualmente)
Route::middleware('auth')->group(function () {
Route::get('/admin/reservas', [AdminController::class, 'showReservations'])->name('admin.reservations');
});

Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');