@extends('layouts.app')

@section('title', 'Editar Reserva')

@section('content')
    <h1>Editar Reserva</h1>

    <form action="{{ route('reservas.update', $reserva) }}" method="POST">
        @csrf 
        @method('PUT')

        <!-- Aula -->
        <div class="mb-3">
            <label for="aula_id">Aula</label>
            <select name="aula_id" class="form-control">
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}" {{ old('aula_id', $reserva->aula_id) == $aula->id ? 'selected' : '' }}>
                        {{ $aula->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Docente -->
        <div class="mb-3">
            <label for="docente_id">Docente</label>
            <select name="docente_id" class="form-control">
                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}" {{ old('docente_id', $reserva->docente_id) == $docente->id ? 'selected' : '' }}>
                        {{ $docente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Materia -->
        <div class="mb-3">
            <label for="materia_id">Materia</label>
            <select name="materia_id" class="form-control">
                @foreach($materias as $materia)
                    <option value="{{ $materia->id }}" {{ old('materia_id', $reserva->materia_id) == $materia->id ? 'selected' : '' }}>
                        {{ $materia->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Fecha -->
        <div class="mb-3">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="form-control" value="{{ old('fecha', $reserva->fecha) }}" required>
        </div>

        <!-- Hora inicio -->
        <div class="mb-3">
            <label for="hora_inicio">Hora de inicio</label>
            <input type="time" name="hora_inicio" class="form-control" value="{{ old('hora_inicio', $reserva->hora_inicio) }}" required>
        </div>

        <!-- Hora fin -->
        <div class="mb-3">
            <label for="hora_fin">Hora de fin</label>
            <input type="time" name="hora_fin" class="form-control" value="{{ old('hora_fin', $reserva->hora_fin) }}" required>
        </div>

        <!-- Tipo de origen -->
        <div class="mb-3">
            <label for="tipo_origen">Tipo de origen</label>
            <input type="text" name="tipo_origen" class="form-control" value="{{ old('tipo_origen', $reserva->tipo_origen) }}" required>
        </div>

        <button class="btn btn-primary-action">
            <i class="fa-solid fa-floppy-disk"></i> Actualizar
        </button>
    </form>
@endsection
