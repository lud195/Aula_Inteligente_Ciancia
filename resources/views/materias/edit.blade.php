@extends('layouts.app')

@section('title', 'Editar Materia')

@section('content')
<div class="container mt-4">
    <h1>Editar Materia: {{ $materia->nombre }}</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('materias.update', $materia) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $materia->nombre) }}">
        </div>

        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" name="codigo" id="codigo" class="form-control" value="{{ old('codigo', $materia->codigo) }}">
        </div>

        <div class="mb-3">
            <label for="carrera" class="form-label">Carrera</label>
            <input type="text" name="carrera" id="carrera" class="form-control" value="{{ old('carrera', $materia->carrera) }}">
        </div>

        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <select name="anio" id="anio" class="form-select">
                @php
                    $anios = [1 => '1ro', 2 => '2do', 3 => '3ro', 4 => '4to', 5 => '5to'];
                @endphp
                @foreach($anios as $key => $label)
                    <option value="{{ $key }}" {{ old('anio', $materia->anio) == $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo_cursada" class="form-label">Tipo de Cursada</label>
            <select name="tipo_cursada" id="tipo_cursada" class="form-select">
                @foreach(['Presencial', 'Virtual', 'Mixta'] as $tipo)
                    <option value="{{ $tipo }}" {{ old('tipo_cursada', $materia->tipo_cursada) == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="docente_id" class="form-label">Docente</label>
            <select name="docente_id" id="docente_id" class="form-select">
                <option value="">Sin asignar</option>
                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}" {{ old('docente_id', $materia->docente_id) == $docente->id ? 'selected' : '' }}>
                        {{ $docente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('materias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
