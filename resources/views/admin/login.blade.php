@extends('layouts.app')

@section('title', 'Acceso Administrador')

@section('content')
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h3><i class="bi bi-shield-lock"></i> Acceso Administrador</h3>
                </div>
                
                <div class="card-body p-4">
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf
    <input type="text" name="usuario" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Iniciar Sesión</button>

    @if($errors->any())
        <div>{{ $errors->first('message') }}</div>
    @endif
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection