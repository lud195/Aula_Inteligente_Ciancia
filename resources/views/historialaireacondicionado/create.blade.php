@extends('layouts.app')

@section('title', 'Agregar Registro al Historial')

@section('content')
<div class="container p-4 bg-white rounded shadow-sm">
    <h1>Agregar Registro al Historial - Aula: {{ $aireacondicionado->aula->nombre ?? $aireacondicionado->aula_id }}</h1>

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

    <form action="{{ route('historialaireacondicionados.store', $aireacondicionado->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha') }}" required>
        </div>

        <div class="mb-3">
            <label for="hora_inicio">Hora Inicio:</label>
            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" value="{{ old('hora_inicio') }}" required>
        </div>

        <div class="mb-3">
            <label for="hora_fin">Hora Fin:</label>
            <input type="time" name="hora_fin" id="hora_fin" class="form-control" value="{{ old('hora_fin') }}">
        </div>

        <div class="mb-3">
            <label for="temperatura">Temperatura:</label>
            <input type="text" name="temperatura" id="temperatura" class="form-control" value="{{ old('temperatura') }}" placeholder="Ej. 24°C">
        </div>


        <button class="btn btn-primary-action">
    <i class="fa-solid fa-floppy-disk"></i> Guardar Registro
</button>
    </form>
</div>
@endsection
