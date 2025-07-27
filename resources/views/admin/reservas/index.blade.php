@extends('layouts.app')

@section('content')
<h1>Panel de Administrador - Reservas</h1>
<a href="{{ route('vacaciones') }}">Regresar</a>
<table border="1">
    <tr>
        <th>ID</th><th>Nombre</th><th>Email</th><th>Destino</th>
        <th>Fecha Inicio</th><th>Fecha Fin</th><th>Habitaciones</th>
    </tr>
    @forelse($reservas as $reserva)
    <tr>
        <td>{{ $reserva->id }}</td>
        <td>{{ $reserva->nombre }}</td>
        <td>{{ $reserva->email }}</td>
        <td>{{ $reserva->destino }}</td>
        <td>{{ $reserva->fecha_inicio }}</td>
        <td>{{ $reserva->fecha_fin }}</td>
        <td>{{ $reserva->habitaciones }}</td>
    </tr>
    @empty
    <tr><td colspan="7">No hay reservas registradas</td></tr>
    @endforelse
</table>
@endsection