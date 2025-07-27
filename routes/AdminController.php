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
        return view('admin.login'); // Asegúrate de tener esta vista
    }

    // ✅ Procesa el login manual (sin usar Auth de Laravel)
    public function login(Request $request)
    {
        $validated = $request->validate([
            'usuario' => 'required',
            'password' => 'required'
        ]);

        // Acceso con usuario y contraseña fijos
        if ($validated['usuario'] === 'admin' && $validated['password'] === 'contraseña_segura') {
            session(['admin_logged_in' => true]); // Guarda sesión
            return redirect()->route('admin.reservations'); // Redirige
        }

        return back()->withErrors([
            'message' => 'Credenciales incorrectas'
        ]);
    }

    // ✅ Muestra la lista de reservas solo si está logueado
    public function showReservations()
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login')->withErrors(['message' => 'Acceso no autorizado']);
        }

        $reservas = Reserva::orderBy('created_at', 'desc')->get();
        return view('admin.reservations', compact('reservas')); // Vista donde se listan las reservas
    }
}