<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservaController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'destino' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
            'habitaciones' => 'required|integer|min:1'
        ]);

        Reserva::create($validatedData);

        return redirect()->route('vacaciones')
            ->with('success', 'Reserva registrada exitosamente!');
    }
}