@extends('layouts.app')

@section('title', 'Crear Horario')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Nuevo Horario</h1>

    {{-- Mostrar errores --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('horarios.store') }}" method="POST">
        @csrf

        {{-- MATERIA --}}
        <div class="mb-3">
            <label for="materia_id" class="form-label">Materia</label>
            <select name="materia_id" class="form-select" required>
                <option value="">Selecciona una materia</option>
                @foreach($materias as $materia)
                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                @endforeach
            </select>
        </div>

        {{-- DÍA --}}
        <div class="mb-3">
            <label for="dia" class="form-label">Día</label>
            <select name="dia" class="form-select" required>
                <option value="">Selecciona un día</option>
                @foreach(['lunes','martes','miércoles','jueves','viernes'] as $dia)
                    <option value="{{ $dia }}">{{ ucfirst($dia) }}</option>
                @endforeach
            </select>
        </div>

        {{-- FRANJA HORARIA --}}
        <div class="mb-3">
            <label for="hora" class="form-label">Franja Horaria</label>
            <select name="hora" class="form-select" required>
                <option value="">Selecciona una franja</option>
                @foreach($franjas as $franja)
                    <option value="{{ $franja }}">{{ $franja }}</option>
                @endforeach
            </select>
        </div>

        {{-- DOCENTE --}}
        <div class="mb-3">
            <label for="docente_id" class="form-label">Docente</label>
            <select name="docente_id" class="form-select" required>
                <option value="">Selecciona un docente</option>
                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                @endforeach
            </select>
        </div>

        {{-- AULA --}}
        <div class="mb-3">
            <label for="aula_id" class="form-label">Aula</label>
            <select name="aula_id" class="form-select" required>
                <option value="">Selecciona un aula</option>
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
                @endforeach
            </select>
        </div>

        {{-- Botones --}}
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
