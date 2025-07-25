@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Registro a Historial de Foco</h1>

    <form action="{{ route('historialfocos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="foco_id" class="form-label">Foco</label>
            <select name="foco_id" id="foco_id" class="form-select" required>
                @foreach($focos as $foco)
                    <option value="{{ $foco->id }}" {{ old('foco_id') == $foco->id ? 'selected' : '' }}>{{ $foco->codigo }} - {{ $foco->ubicacion }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_cambio" class="form-label">Fecha de Cambio</label>
            <input type="date" name="fecha_cambio" id="fecha_cambio" class="form-control" required value="{{ old('fecha_cambio') }}">
        </div>

        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora Inicio</label>
            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" value="{{ old('hora_inicio') }}">
        </div>

        <div class="mb-3">
            <label for="hora_fin" class="form-label">Hora Fin</label>
            <input type="time" name="hora_fin" id="hora_fin" class="form-control" value="{{ old('hora_fin') }}">
        </div>

        <div class="mb-3">
            <label for="accion" class="form-label">Acción</label>
            <select name="accion" id="accion" class="form-select" required>
                <option value="encendido" {{ old('accion') == 'encendido' ? 'selected' : '' }}>Encendido</option>
                <option value="apagado" {{ old('accion') == 'apagado' ? 'selected' : '' }}>Apagado</option>
                <option value="mantenimiento" {{ old('accion') == 'mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="1" {{ old('estado') == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('estado') == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <button class="btn btn-success" type="submit">Guardar</button>
        <a href="{{ route('historialfocos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
