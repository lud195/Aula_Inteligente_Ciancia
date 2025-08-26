@extends('layouts.app')

@section('title', 'Editar Registro de Historial')

@section('content')
<div class="container p-4 bg-white rounded shadow-sm">
    <h1>Editar Registro </h1>

    <a href="{{ route('historialaireacondicionado.index', $aireacondicionado->id) }}" class="btn btn-secondary mb-3">Volver al Historial</a>

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <form action="{{ route('historialaireacondicionados.update', [$aireacondicionado->id, $historial->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha', $historial->fecha) }}" required>
        </div>

        <div class="mb-3">
            <label for="hora_inicio">Hora Inicio:</label>
            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" value="{{ old('hora_inicio', $historial->hora_inicio) }}" required>
        </div>

        <div class="mb-3">
            <label for="hora_fin">Hora Fin:</label>
            <input type="time" name="hora_fin" id="hora_fin" class="form-control" value="{{ old('hora_fin', $historial->hora_fin) }}">
        </div>

        <div class="mb-3">
            <label for="temperatura">Temperatura:</label>
            <input type="text" name="temperatura" id="temperatura" class="form-control" value="{{ old('temperatura', $historial->temperatura) }}" placeholder="Ej. 24°C">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Registro</button>
    </form>
</div>
@endsection
