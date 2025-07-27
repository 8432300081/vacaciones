@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Reservas</h5>
                        <h2 class="mb-0">{{ $reservas->count() }}</h2>
                    </div>
                    <i class="bi bi-calendar-check fs-1"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Última Reserva</h5>
                        <h6 class="mb-0">
                            @if($reservas->isNotEmpty())
                                {{ $reservas->first()->created_at->diffForHumans() }}
                            @else
                                Sin registros
                            @endif
                        </h6>
                    </div>
                    <i class="bi bi-clock-history fs-1"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Acciones</h5>
                        <a href="{{ route('admin.reservations') }}" class="text-white">Ver todas</a>
                    </div>
                    <i class="bi bi-list-check fs-1"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Reservaciones Recientes</h5>
    </div>
    <div class="card-body">
        @if($reservas->isEmpty())
            <div class="alert alert-warning">No hay reservaciones recientes</div>
        @else
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Destino</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservas->take(5) as $reserva)
                        <tr>
                            <td>{{ $reserva->id }}</td>
                            <td>{{ $reserva->nombre }}</td>
                            <td>{{ $reserva->destino }}</td>
                            <td>{{ $reserva->created_at->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection