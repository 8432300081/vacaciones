<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // ✅ Muestra el formulario de login
    public function showLogin()
    {
        return view('admin.login'); // Asegúrate de que esta vista exista
    }

    // ✅ Procesa el login
    public function login(Request $request)
    {
        $validated = $request->validate([
            'usuario' => 'required',
            'password' => 'required'
        ]);

        // Verifica usuario y contraseña manualmente
        if ($validated['usuario'] === 'admin' && $validated['password'] === 'contraseña_segura') {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.reservations');
        }

        return back()->withErrors([
            'message' => 'Credenciales incorrectas'
        ]);
    }

    // ✅ Muestra las reservas si el admin ha iniciado sesión
    public function showReservations()
    {
         $reservas = \App\Models\Reserva::orderBy('created_at', 'desc')->get();

        return view('admin.reservations', compact('reservas'));
    }
}