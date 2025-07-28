<!DOCTYPE html>
<html>
<head>
    <title>Reservas</title>
    <style>
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Listado de Reservas</h2>

    @if ($reservas->count())
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Destino</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Habitaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->nombre }}</td>
                        <td>{{ $reserva->email }}</td>
                        <td>{{ $reserva->destino }}</td>
                        <td>{{ $reserva->fecha_inicio }}</td>
                        <td>{{ $reserva->fecha_fin }}</td>
                        <td>{{ $reserva->habitaciones }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align: center;">No hay reservas registradas.</p>
    @endif
</body>
</html>