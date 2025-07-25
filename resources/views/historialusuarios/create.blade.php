@extends('layouts.app')

@section('title', 'Registrar Uso de Aire')

@section('content')
<div class="container">
    <h1>Registrar uso de aire acondicionado</h1>

    <form action="{{ route('historial_aire.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="aire_acondicionado_id">Aire Acondicionado</label>
            <select name="aire_acondicionado_id" class="form-control" required>
                @foreach ($aires as $aire)
                    <option value="{{ $aire->id }}">Aula {{ $aire->aula_id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_uso">Fecha y hora de uso</label>
            <input type="datetime-local" name="fecha_uso" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="accion">Acción</label>
            <select name="accion" class="form-control" required>
                <option value="Encendido">Encendido</option>
                <option value="Apagado">Apagado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
