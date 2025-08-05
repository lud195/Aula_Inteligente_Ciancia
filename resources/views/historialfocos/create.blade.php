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
        <option value="reparado" {{ old('accion') == 'reparado' ? 'selected' : '' }}>Reparado</option>
        <option value="cambiado" {{ old('accion') == 'cambiado' ? 'selected' : '' }}>Cambiado</option>
        <option value="revisado" {{ old('accion') == 'revisado' ? 'selected' : '' }}>Revisado</option>
        <option value="fuera de servicio" {{ old('accion') == 'fuera de servicio' ? 'selected' : '' }}>Fuera de servicio</option>
    </select>
</div>


<div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <select name="estado" id="estado" class="form-select" required>
        <option value="apagado" {{ old('estado') == 'apagado' ? 'selected' : '' }}>Apagado</option>
        <option value="encendido" {{ old('estado') == 'encendido' ? 'selected' : '' }}>Encendido</option>
        <option value="en reparación" {{ old('estado') == 'en reparación' ? 'selected' : '' }}>En reparación</option>
        <option value="fuera de servicio" {{ old('estado') == 'fuera de servicio' ? 'selected' : '' }}>Fuera de servicio</option>
    </select>
</div>


        <button class="btn btn-success" type="submit">Guardar</button>
        <a href="{{ route('historialfocos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
