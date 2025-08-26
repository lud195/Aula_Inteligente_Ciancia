@extends('layouts.app')

@section('title', 'Crear Reserva')

@section('content')
    <h1>Crear Reserva</h1>

    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="aula_id">Aula</label>
            <select name="aula_id" class="form-control">
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="docents_id">Docente</label>
            <select name="docente_id" class="form-control">
                @foreach($docentes as $docentes)
                    <option value="{{ $docentes->id }}">{{ $docentes->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="materia_id">Materia</label>
            <select name="materia_id" class="form-control">
                @foreach($materias as $materia)
                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hora_inicio">Hora de inicio</label>
            <input type="time" name="hora_inicio" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hora_fin">Hora de fin</label>
            <input type="time" name="hora_fin" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tipo_origen">Tipo de origen</label>
            <input type="text" name="tipo_origen" class="form-control" required>
        </div>

        <button class="btn btn-primary-action">
    <i class="fa-solid fa-floppy-disk"></i> Guardar
</button>
    </form>
@endsection
