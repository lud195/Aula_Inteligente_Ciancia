@extends('layouts.app')
@section('title', 'Detalle Aire Acondicionado')
@section('content')
<div class="container p-4 bg-white rounded shadow-sm">
  <h1>Aire ID: {{ $aireacondicionado->id }} – Aula: {{ $aireacondicionado->aula->nombre ?? $aireacondicionado->aula_id }}</h1>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  {{-- Formulario edición --}}
  <form action="{{ route('aireacondicionados.update', $aireacondicionado->id) }}" method="POST" class="mb-4">
    @csrf @method('PUT')
    <div class="mb-2"><label>Marca:<input type="text" name="marca" value="{{ old('marca', $aireacondicionado->marca) }}" required></label></div>
    <div class="mb-2"><label>Modelo:<input type="text" name="modelo" value="{{ old('modelo', $aireacondicionado->modelo) }}" required></label></div>
    <div class="mb-2">
      <label>Estado:<select name="estado" required>
        <option value="Encendido" {{ $aireacondicionado->estado == 'Encendido' ? 'selected' : '' }}>Encendido</option>
        <option value="Apagado" {{ $aireacondicionado->estado == 'Apagado' ? 'selected' : '' }}>Apagado</option>
        <option value="En mantenimiento" {{ $aireacondicionado->estado == 'En mantenimiento' ? 'selected' : '' }}>En mantenimiento</option>
      </select></label>
    </div>
    <div class="mb-2">
      <label>Mantenimiento:<select name="mantenimiento" required>
        <option value="Al día" {{ $aireacondicionado->mantenimiento == 'Al día' ? 'selected' : '' }}>Al día</option>
        <option value="Pendiente" {{ $aireacondicionado->mantenimiento == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="En proceso" {{ $aireacondicionado->mantenimiento == 'En proceso' ? 'selected' : '' }}>En proceso</option>
      </select></label>
    </div>
    <button type="submit" class="btn btn-primary">Guardar detalles</button>
  </form>

  <hr>

  {{-- Formulario para añadir historial --}}
  <h2>Agregar Registro al Historial</h2>
  <form action="{{ route('historialaireacondicionado.store', $aireacondicionado->id) }}" method="POST">
    @csrf
    <div class="mb-2"><label>Fecha:<input type="date" name="fecha" required></label></div>
    <div class="mb-2"><label>Hora inicio:<input type="time" name="hora_inicio" required></label></div>
    <div class="mb-2"><label>Hora fin:<input type="time" name="hora_fin"></label></div>
    <div class="mb-2"><label>Temperatura:<input type="text" name="temperatura" placeholder="Ej. 24°C"></label></div>
    <button type="submit" class="btn btn-success">Guardar historial</button>
</form>



  {{-- Lista del historial --}}
  <h3>Historial</h3>
  <ul>
    @forelse ($historial as $registro)
      <li>{{ $registro->fecha }} – {{ $registro->hora_inicio }} a {{ $registro->hora_fin ?? 'N/A' }} – Temp: {{ $registro->temperatura ?? 'N/A' }}</li>
    @empty
      <li>No hay registros aún.</li>
    @endforelse
  </ul>
</div>
@endsection
