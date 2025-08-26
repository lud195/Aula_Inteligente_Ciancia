@extends('layouts.app')

@section('title', 'Detalle Aire Acondicionado')

@section('content')
<div class="container p-4 bg-white rounded shadow-sm">
  <h1>Aire Acondicionado  – Aula: {{ $aireacondicionado->aula->nombre ?? $aireacondicionado->aula_id }}</h1>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <p><strong>Marca:</strong> {{ $aireacondicionado->marca }}</p>
  <p><strong>Modelo:</strong> {{ $aireacondicionado->modelo }}</p>
  <p><strong>Estado:</strong> {{ $aireacondicionado->estado }}</p>
  <p><strong>Mantenimiento:</strong> {{ $aireacondicionado->mantenimiento }}</p>

  <a href="{{ route('aireacondicionados.edit', $aireacondicionado->id) }}" class="btn btn-warning">Editar</a>
  <a href="{{ route('historialaireacondicionado.index', $aireacondicionado->id) }}" class="btn btn-primary">Historial</a>
  <a href="{{ route('aireacondicionados.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
