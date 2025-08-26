@extends('layouts.app')

@section('title', 'Agregar Aire Acondicionado')

@section('content')
<div class="container p-4 bg-white rounded shadow-sm">
    <h1>Agregar Nuevo Aire Acondicionado</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
    @endif

    {{-- El action apunta a la ruta resource 'store' para crear aire acondicionado --}}
    <form action="{{ route('aireacondicionados.store') }}" method="POST" class="mb-4">

        @csrf

        <label for="aula_id">Aula:</label>
        <select name="aula_id" id="aula_id" required>
            <option value="">Selecciona un aula</option>
            @foreach ($aulas as $aula)
                <option value="{{ $aula->id }}" {{ old('aula_id') == $aula->id ? 'selected' : '' }}>
                    {{ $aula->nombre ?? 'Aula ' . $aula->id }}
                </option>
            @endforeach
        </select>

        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" value="{{ old('marca') }}" required />

        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" value="{{ old('modelo') }}" required />

        <label for="estado">Estado:</label>
        <select name="estado" id="estado" required>
            <option value="Encendido" {{ old('estado') == 'Encendido' ? 'selected' : '' }}>Encendido</option>
            <option value="Apagado" {{ old('estado') == 'Apagado' ? 'selected' : '' }}>Apagado</option>
            <option value="En mantenimiento" {{ old('estado') == 'En mantenimiento' ? 'selected' : '' }}>En mantenimiento</option>
        </select>

        <label for="mantenimiento">Mantenimiento:</label>
        <select name="mantenimiento" id="mantenimiento" required>
            <option value="Al día" {{ old('mantenimiento') == 'Al día' ? 'selected' : '' }}>Al día</option>
            <option value="Pendiente" {{ old('mantenimiento') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="En proceso" {{ old('mantenimiento') == 'En proceso' ? 'selected' : '' }}>En proceso</option>
        </select>

        <button class="btn btn-primary-action">
    <i class="fa-solid fa-floppy-disk"></i> Guardar
</button>
        <a href="{{ route('aireacondicionados.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
