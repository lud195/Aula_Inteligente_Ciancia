@extends('layouts.app')

@section('title', 'Crear Materia')

@section('content')
<div class="container mt-4">
    <h1>Crear Materia</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('materias.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        </div>
        
        <div class="mb-3">
    <label for="codigo" class="form-label">Código</label>
    <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $codigo ?? '' }}" readonly>
</div>


        <div class="mb-3">
            <label for="carrera" class="form-label">Carrera</label>
            <input type="text" class="form-control" id="carrera" name="carrera" value="{{ old('carrera') }}" required>
        </div>

        <div class="mb-3">
            <label for="anio" class="form-label">Año</label>
            <select name="anio" id="anio" class="form-select" required>
                <option value="1">1ro</option>
                <option value="2">2do</option>
                <option value="3">3ro</option>
                <option value="4">4to</option>
                <option value="5">5to</option>
            </select>

        </div>

        <div class="mb-3">
            <label for="tipo_cursada" class="form-label">Tipo de Cursada</label>
            <select class="form-select" id="tipo_cursada" name="tipo_cursada" required>
                <option value="">Seleccione tipo</option>
                @foreach (['Presencial', 'Virtual', 'Mixta'] as $tipo)
                    <option value="{{ $tipo }}" {{ old('tipo_cursada') == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="docente_id" class="form-label">Docente</label>
            <select class="form-select" id="docente_id" name="docente_id" required>
                <option value="">Seleccione docentes</option>
                @foreach ($docentes as $docentes)
                    <option value="{{ $docentes->id }}" {{ old('docente_id') == $docentes->id ? 'selected' : '' }}>{{ $docentes->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary-action">
    <i class="fa-solid fa-floppy-disk"></i> Guardar
</button>
        <a href="{{ route('materias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
