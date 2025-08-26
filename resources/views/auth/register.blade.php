@extends('layouts.app', ['noVolverInicio' => true])

@section('title', 'Registro')

<style>
    input:-webkit-autofill,
input:-webkit-autofill:hover, 
input:-webkit-autofill:focus, 
input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0px 1000px white inset !important; /* fondo blanco */
    -webkit-text-fill-color: #343A40 !important; /* color de texto */
    transition: background-color 5000s ease-in-out 0s; /* evita parpadeo */
}
</style>

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Registro</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="role" class="form-label">Tipo de usuario</label>
            <select name="role" id="role" class="form-select @error('role') is-invalid @enderror" required>
                <option value="">Seleccione su rol</option>
                <option value="alumno" {{ old('role') == 'alumno' ? 'selected' : '' }}>Alumno</option>
                <option value="docente" {{ old('role') == 'docente' ? 'selected' : '' }}>Docente</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nombre completo</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Registrarse</button>

        <div class="mt-3 text-center">
            <a href="{{ route('login') }}">¿Ya tienes cuenta? Iniciar sesión</a>
        </div>
    </form>
</div>
@endsection
