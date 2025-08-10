@extends('layouts.app')

@section('title', 'Editar Horario')

@section('content')
<div class="container mt-4">
    <h2>Editar horario</h2>

    <form action="{{ route('horarios.update', $horario) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- MATERIA --}}
        <div class="mb-3">
            <label for="materia_id" class="form-label">Materia</label>
            <select name="materia_id" class="form-select" required>
                @foreach($materias as $materia)
                    <option value="{{ $materia->id }}" {{ $horario->materia_id == $materia->id ? 'selected' : '' }}>
                        {{ $materia->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- DÍA --}}
        <div class="mb-3">
            <label for="dia" class="form-label">Día</label>
            <select name="dia" class="form-select" required>
                @foreach(['lunes','martes','miércoles','jueves','viernes'] as $dia)
                    <option value="{{ $dia }}" {{ $horario->dia == $dia ? 'selected' : '' }}>
                        {{ ucfirst($dia) }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- HORA INICIO --}}
        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora de inicio</label>
            <input type="time" name="hora_inicio" value="{{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }}" class="form-control" step="60" required>
        </div>

        {{-- HORA FIN --}}
        <div class="mb-3">
            <label for="hora_fin" class="form-label">Hora de fin</label>
            <input type="time" name="hora_fin" value="{{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}" class="form-control" step="60" required>
        </div>

        {{-- DOCENTE --}}
        <div class="mb-3">
            <label for="docente_id" class="form-label">Docente</label>
            <select name="docente_id" class="form-select" required>
                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}" {{ $horario->docente_id == $docente->id ? 'selected' : '' }}>
                        {{ $docente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- AULA --}}
        <div class="mb-3">
            <label for="aula_id" class="form-label">Aula</label>
            <select name="aula_id" class="form-select" required>
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}" {{ $horario->aula_id == $aula->id ? 'selected' : '' }}>
                        {{ $aula->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

