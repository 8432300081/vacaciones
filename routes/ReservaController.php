<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
{
    $reservas = Reserva::all(); // Carga todas las reservas
    return view('admin.reservas.index', compact('reservas'));
}
}