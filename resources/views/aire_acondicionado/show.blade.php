@extends('layouts.app')

@section('title', 'Detalle Aire Acondicionado')

@section('content')
<div class="container p-4 bg-white rounded shadow-sm">
  <h1>Aire Acondicionado ID: {{ $aire->id }} - Aula {{ $aire->aula->nombre ?? $aire->aula_id }}</h1>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form action="{{ route('aireacondicionados.update', $aire->id) }}" method="POST" class="mb-4">
    @csrf
    @method('PUT')

    <label>Marca:
      <input type="text" name="marca" value="{{ old('marca', $aire->marca) }}" required />
    </label>

    <label>Modelo:
      <input type="text" name="modelo" value="{{ old('modelo', $aire->modelo) }}" required />
    </label>

    <label>Estado:
      <select name="estado" required>
        <option value="Encendido" {{ $aire->estado == 'Encendido' ? 'selected' : '' }}>Encendido</option>
        <option value="Apagado" {{ $aire->estado == 'Apagado' ? 'selected' : '' }}>Apagado</option>
        <option value="En mantenimiento" {{ $aire->estado == 'En mantenimiento' ? 'selected' : '' }}>En mantenimiento</option>
      </select>
    </label>

    <label>Mantenimiento:
      <select name="mantenimiento" required>
        <option value="Al día" {{ $aire->mantenimiento == 'Al día' ? 'selected' : '' }}>Al día</option>
        <option value="Pendiente" {{ $aire->mantenimiento == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="En proceso" {{ $aire->mantenimiento == 'En proceso' ? 'selected' : '' }}>En proceso</option>
      </select>
    </label>

    <button type="submit">Guardar detalles</button>
  </form>

  <hr>

  <h2>Historial de Uso</h2>

  <form action="{{ route('aireacondicionados.historial.add', $aire->id) }}" method="POST" class="mb-4">
    @csrf

    <label>Fecha:
      <input type="date" name="fecha" required />
    </label>

    <label>Hora de inicio:
      <input type="time" name="hora_inicio" required />
    </label>

    <label>Hora fin:
      <input type="time" name="hora_fin" />
    </label>

    <label>Temperatura:
      <input type="text" name="temperatura" placeholder="Ej. 24°C" />
    </label>

    <button type="submit">Agregar al historial</button>
  </form>

  <ul>
    @forelse ($historial as $registro)
      <li>
        {{ $registro->fecha }} - {{ $registro->hora_inicio }} a {{ $registro->hora_fin ?? 'N/A' }} - Temp: {{ $registro->temperatura ?? 'N/A' }}
      </li>
    @empty
      <li>No hay registros aún.</li>
    @endforelse
  </ul>
</div>
@endsection
