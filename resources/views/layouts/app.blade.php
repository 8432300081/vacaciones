<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- ✅ Meta viewport -->
    <title>@yield('title', 'Sistema de Reservaciones')</title>

    <!-- ✅ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Bootstrap Icons (opcional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- ✅ Estilos personalizados (si los tienes) -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #3d5685;
        }

        .card {
            border-radius: 1rem;
        }

        .btn {
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>
    <!-- ✅ Encabezado general (opcional) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Reservaciones</a>
        </div>
    </nav>

    <!-- ✅ Contenido principal -->
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- ✅ Bootstrap JS (necesario para algunas funcionalidades) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>