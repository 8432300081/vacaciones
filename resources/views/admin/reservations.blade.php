@extends('layouts.app')

@section('title', 'Reservaciones')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Vista de Reservaciones</h1>
                <p>Total registros encontrados: {{ $reservas->count() }}</p>
                <h2 class="h4 mb-0">
                    <i class="bi bi-table me-2"></i>Reservaciones Registradas
                </h2>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-light">
                        <i class="bi bi-box-arrow-left"></i> Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>

        <div class="card-body">
            @if($reservas->isEmpty())
                <div class="alert alert-info">
                    No hay reservaciones registradas.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Destino</th>
                                <th>Fechas</th>
                                <th>Habitaciones</th>
                                <th>Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservas as $reserva)
                            <tr>
                                <td>{{ $reserva->id }}</td>
                                <td>{{ $reserva->nombre }}</td>
                                <td>
                                    <a href="mailto:{{ $reserva->email }}" class="text-decoration-none">
                                        {{ $reserva->email }}
                                    </a>
                                </td>
                                <td>{{ $reserva->destino }}</td>
                                <td>
                                    <span class="badge bg-primary">Inicio: {{ \Carbon\Carbon::parse($reserva->fecha_inicio)->format('d/m/Y') }}</span>
                                    <span class="badge bg-secondary">Fin: {{ \Carbon\Carbon::parse($reserva->fecha_fin)->format('d/m/Y')) }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success rounded-pill">{{ $reserva->habitaciones }}</span>
                                </td>
                                <td>{{ $reserva->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-3">
                    <p class="text-muted">Mostrando <strong>{{ $reservas->count() }}</strong> registros</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection