@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Encabezado -->
    <header class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">¡Explora tus Vacaciones Perfectas!</h1>
        <nav class="d-flex justify-content-center gap-3 mt-4">
            <a href="https://pixabay.com/es/photos/search/lugares%20turisticos/" 
               target="_blank" 
               class="btn btn-outline-primary">
                <i class="bi bi-image"></i> Ver más fotos turísticas
            </a>
            <a href="{{ route('admin.login') }}" 
               class="btn btn-dark">
                <i class="bi bi-lock"></i> Acceso Administrador
            </a>
        </nav>
    </header>

    <!-- Álbum de Destinos -->
    <section class="mb-5">
        <h2 class="text-center mb-4 display-5">Álbum de Destinos</h2>
        <div class="row g-4">
            <!-- Destino Playa -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-img-top overflow-hidden" style="height: 250px;">
                        <img src="{{ asset('images/foto1.jpg') }}" 
                             alt="Destino Playa" 
                             class="img-fluid w-100 h-100 object-fit-cover hover-zoom">
                    </div>
                    <div class="card-body text-center">
                        <h3 class="h5 card-title">Destino Playa</h3>
                        <p class="card-text">Disfruta de las mejores playas con todos los servicios</p>
                    </div>
                </div>
            </div>
            
            <!-- Destino Montaña -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-img-top overflow-hidden" style="height: 250px;">
                        <img src="{{ asset('images/foto2.jpg') }}" 
                             alt="Destino Montaña" 
                             class="img-fluid w-100 h-100 object-fit-cover hover-zoom">
                    </div>
                    <div class="card-body text-center">
                        <h3 class="h5 card-title">Destino Montaña</h3>
                        <p class="card-text">Aventuras increíbles en paisajes naturales</p>
                    </div>
                </div>
            </div>
            
            <!-- Destino Pueblo Mágico -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-img-top overflow-hidden" style="height: 250px;">
                        <img src="{{ asset('images/foto3.jpg') }}" 
                             alt="Destino Pueblo Mágico" 
                             class="img-fluid w-100 h-100 object-fit-cover hover-zoom">
                    </div>
                    <div class="card-body text-center">
                        <h3 class="h5 card-title">Destino Pueblo Mágico</h3>
                        <p class="card-text">Descubre la magia de nuestros pueblos tradicionales</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Formulario de Reserva -->
    <section class="card shadow border-0 p-4">
        <h2 class="text-center mb-4 display-5">Realiza tu Reserva</h2>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        <form action="{{ route('reservar') }}" method="POST" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" required>
            </div>
            
            <div class="col-md-6">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control form-control-lg" id="email" name="email" required>
            </div>
            
            <div class="col-md-4">
                <label for="destino" class="form-label">Destino</label>
                <select id="destino" name="destino" class="form-select form-select-lg" required>
                    <option value="" selected disabled>Selecciona un destino</option>
                    <option value="Playa">Playa</option>
                    <option value="Montaña">Montaña</option>
                    <option value="Pueblo Mágico">Pueblo Mágico</option>
                </select>
            </div>
            
            <div class="col-md-4">
                <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                <input type="date" class="form-control form-control-lg" id="fecha_inicio" name="fecha_inicio" required>
            </div>
            
            <div class="col-md-4">
                <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                <input type="date" class="form-control form-control-lg" id="fecha_fin" name="fecha_fin" required>
            </div>
            
            <div class="col-md-12">
                <label for="habitaciones" class="form-label">Número de Habitaciones</label>
                <input type="number" class="form-control form-control-lg" id="habitaciones" name="habitaciones" min="1" required>
            </div>
            
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg px-5 py-3">
                    <i class="bi bi-calendar-check"></i> Reservar Ahora
                </button>
            </div>
        </form>
    </section>
</div>

<footer class="bg-dark text-white py-4 mt-5">
    <div class="container text-center">
        <p class="mb-1">Derechos de autor © 2024. Guillermo Sosa.</p>
        <p class="mb-0">
            <i class="bi bi-envelope"></i> Contacto: 8432300081@univermilenium.edu.mx
        </p>
    </div>
</footer>

<style>
    /* Efecto de zoom al pasar el cursor */
    .hover-zoom {
        transition: transform 0.5s ease;
    }
    .hover-zoom:hover {
        transform: scale(1.05);
    }
    
    /* Asegurar que las imágenes cubran el espacio */
    .object-fit-cover {
        object-fit: cover;
    }
    
    /* Mejorar el aspecto de las tarjetas */
    .card {
        transition: all 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    /* Estilo para el formulario */
    .form-control-lg, .form-select-lg {
        padding: 0.75rem 1rem;
        font-size: 1.1rem;
    }
</style>

<!-- Incluir Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
@endsection