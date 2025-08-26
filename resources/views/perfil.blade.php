@extends('layouts.app', ['noVolverInicio' => true])

@section('content')
<style>
:root {
    --rosa-principal: #FF8DA1;
    --rosa-claro: #FFD6DC;
    --gris-claro: #F8F9FA;
    --texto-principal: #343A40;
}

.profile-container {
    max-width: 500px;
    margin: 3rem auto;
    background: white;
    border-radius: 15px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    padding: 2rem 2.5rem;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.profile-container h1 {
    color: var(--rosa-principal);
    font-weight: 700;
    text-align: center;
    margin-bottom: 2rem;
    font-size: 2.5rem;
    letter-spacing: 0.05em;
}

.profile-label {
    color: var(--texto-principal);
    font-weight: 600;
    font-size: 1.1rem;
}

.profile-value {
    color: var(--texto-principal);
    font-size: 1.15rem;
    margin-bottom: 1.5rem;
    padding-left: 0.5rem;
    border-left: 3px solid var(--rosa-principal);
    user-select: text;
}

.btn-pastel {
    display: block;
    width: 100%;
    background-color: var(--rosa-principal);
    border: none;
    color: white;
    font-weight: 600;
    font-size: 1.1rem;
    padding: 0.7rem;
    border-radius: 50px;
    margin-top: 1.5rem;
    box-shadow: 0 6px 12px rgba(255,141,161,0.4);
    transition: background 0.3s ease, transform 0.2s ease;
    text-align: center;
    text-decoration: none;
}

.btn-pastel:hover {
    background-color: var(--rosa-claro);
    color: var(--texto-principal);
    transform: translateY(-3px);
    box-shadow: 0 8px 16px rgba(255,141,161,0.5);
}

.img-profile {
    display: block;
    margin: 0 auto 1.5rem auto;
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
    border: 4px solid var(--rosa-principal);
}

.form-control {
    width: 100%;
    padding: 0.5rem 0.7rem;
    border-radius: 10px;
    border: 1px solid #ccc;
    margin-bottom: 1rem;
}
</style>

<div class="profile-container">
    <h1>Mi Perfil</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form action="{{ route('perfil') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Foto de perfil -->
        @if($usuario->foto)
    <img src="{{ asset('storage/' . $usuario->foto) }}" alt="Foto de perfil" class="img-profile">
@else
    <img src="{{ asset('images/foto_defecto.png') }}" alt="Foto de perfil" class="img-profile">
@endif


        <label class="profile-label">Subir nueva foto</label>
        <input type="file" name="foto" class="form-control">

        <!-- Nombre -->
        <label class="profile-label">Nombre</label>
        <input type="text" name="name" value="{{ $usuario->name }}" class="form-control">

        <!-- Email -->
        <label class="profile-label">Email</label>
        <input type="email" name="email" value="{{ $usuario->email }}" class="form-control">

        <!-- Fecha de creación -->
        <p><span class="profile-label">Creado el:</span></p>
        <p class="profile-value">{{ $usuario->created_at->format('d/m/Y') }}</p>

        <button type="submit" class="btn-pastel">Actualizar Perfil</button>
    </form>

    <a href="{{ route('home') }}" class="btn-pastel mt-2">← Volver</a>
</div>
@endsection
