@extends('layouts.app')

@section('title', 'Editar Historial')

@section('content')
<div class="container">
    <h1>Editar historial de uso</h1>

    <form action="{{ route('historial_aire.update', $historial->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="aire_acondicionado_id">Aire Acondicionado</label>
            <select name="aire_acondicionado_id" class="form-control" required>
                @foreach ($aires as $aire)
                    <option value="{{ $aire->id }}" {{ $aire->id == $historial->aire_acondicionado_id ? 'selected' : '' }}>
                        Aula {{ $aire->aula_id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_uso">Fecha y hora</label>
            <input type="datetime-local" name="fecha_uso" class="form-control"
                   value="{{ \Carbon\Carbon::parse($historial->fecha_uso)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label for="accion">Acción</label>
            <select name="accion" class="form-control" required>
                <option value="Encendido" {{ $historial->accion == 'Encendido' ? 'selected' : '' }}>Encendido</option>
                <option value="Apagado" {{ $historial->accion == 'Apagado' ? 'selected' : '' }}>Apagado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
