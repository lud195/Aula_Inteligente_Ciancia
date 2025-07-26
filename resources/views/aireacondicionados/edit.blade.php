@extends('layouts.app')

@section('title', 'Editar Aire Acondicionado')

@section('content')
<div class="container p-4 bg-white rounded shadow-sm">
    <h1>Editar Aire Acondicionado ID: {{ $aireacondicionado->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('aireacondicionados.update', $aireacondicionado->id) }}" method="POST">

        @csrf
        @method('PUT')

        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" value="{{ old('marca', $aireacondicionado->marca) }}" required />

        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" value="{{ old('modelo', $aireacondicionado->modelo) }}" required />

        <label for="estado">Estado:</label>
        <select name="estado" id="estado" required>
            <option value="Encendido" {{ (old('estado', $aireacondicionado->estado) == 'Encendido') ? 'selected' : '' }}>Encendido</option>
            <option value="Apagado" {{ (old('estado', $aireacondicionado->estado) == 'Apagado') ? 'selected' : '' }}>Apagado</option>
            <option value="En mantenimiento" {{ (old('estado', $aireacondicionado->estado) == 'En mantenimiento') ? 'selected' : '' }}>En mantenimiento</option>
        </select>

        <label for="mantenimiento">Mantenimiento:</label>
        <select name="mantenimiento" id="mantenimiento" required>
            <option value="Al día" {{ (old('mantenimiento', $aireacondicionado->mantenimiento) == 'Al día') ? 'selected' : '' }}>Al día</option>
            <option value="Pendiente" {{ (old('mantenimiento', $aireacondicionado->mantenimiento) == 'Pendiente') ? 'selected' : '' }}>Pendiente</option>
            <option value="En proceso" {{ (old('mantenimiento', $aireacondicionado->mantenimiento) == 'En proceso') ? 'selected' : '' }}>En proceso</option>
        </select>

        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
        <a href="{{ route('aire.show', $aire->id) }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
