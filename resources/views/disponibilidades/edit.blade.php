@extends('layouts.app')

@section('title', 'Editar Disponibilidad')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Editar Disponibilidad</h1>

    <form action="{{ route('disponibilidades.index') }}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $disponibilidad->id }}">

        <div class="mb-3">
            <label for="aula_id" class="form-label">Aula</label>
            <select name="aula_id" id="aula_id" class="form-select @error('aula_id') is-invalid @enderror" required>
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}" {{ $aula->id == $disponibilidad->aula_id ? 'selected' : '' }}>
                        {{ $aula->nombre }}
                    </option>
                @endforeach
            </select>
            @error('aula_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="docente_id" class="form-label">Docente</label>
            <select name="docente_id" id="docente_id" class="form-select @error('docente_id') is-invalid @enderror" required>
                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}" {{ $docente->id == $disponibilidad->docente_id ? 'selected' : '' }}>
                        {{ $docente->nombre }}
                    </option>
                @endforeach
            </select>
            @error('docente_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select @error('estado') is-invalid @enderror" required>
                <option value="disponible" {{ $disponibilidad->estado == 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="ocupado" {{ $disponibilidad->estado == 'ocupado' ? 'selected' : '' }}>Ocupado</option>
                <option value="mantenimiento" {{ $disponibilidad->estado == 'mantenimiento' ? 'selected' : '' }}>En mantenimiento</option>
            </select>
            @error('estado')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" name="hora" id="hora" class="form-control @error('hora') is-invalid @enderror" value="{{ $disponibilidad->hora }}" required>
            @error('hora')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{ \Carbon\Carbon::parse($disponibilidad->fecha)->format('Y-m-d') }}" required>
            @error('fecha')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('disponibilidades.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>
@endsection
