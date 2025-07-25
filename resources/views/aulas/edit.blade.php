@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Editar Aula: {{ $aula->nombre }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('aulas.update', $aula->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del aula</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $aula->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" name="ubicacion" id="ubicacion" class="form-control" value="{{ $aula->ubicacion }}">
        </div>
        <div class="mb-3">
            <label for="capacidad" class="form-label">Capacidad</label>
            <input type="number" name="capacidad" id="capacidad" class="form-control" value="{{ $aula->capacidad }}" required>
        </div>
        <div class="mb-3">
            <label for="disponibilidad" class="form-label">Disponibilidad</label>
            <select name="disponibilidad" id="disponibilidad" class="form-select" required>
                <option value="Disponible" {{ $aula->disponibilidad == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="Ocupado" {{ $aula->disponibilidad == 'Ocupado' ? 'selected' : '' }}>Ocupado</option>
                <option value="Mantenimiento" {{ $aula->disponibilidad == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar Aula</button>
        <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
