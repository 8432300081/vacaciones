<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacacionesController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\AdminController;
use App\Models\Reserva;

// Página principal
Route::get('/', [VacacionesController::class, 'index'])->name('vacaciones');

// Procesar reserva
Route::post('/reservar', [ReservaController::class, 'store'])->name('reservar');

// Login Admin
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

// Vista de reservas (protegida manualmente)
//Route::middleware('auth')->group(function () {
//Route::get('/admin/reservas', [AdminController::class, 'showReservations'])->name('admin.reservations');
//});

//Route::get('/login', function () {
//    return redirect('/admin/login');
//})->name('login');
// Grupo de rutas protegidas
Route::middleware(['admin.auth'])->group(function () {
    // Vista de reservaciones (protegida)
    Route::get('/admin/reservations', [AdminController::class, 'reservations'])
        ->name('admin.reservations');
    // Ruta de logout
    Route::post('/admin/logout', [AdminController::class, 'logout'])
        ->name('admin.logout');
});

Route::get('/test-reservas', function () {
    $reservas = Reserva::all();
    return view('test-reservas', compact('reservas'));
});
