@extends('layouts.app')

@section('title', 'Detalle del Mueble')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Detalle del Mueble</h3>
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $mueble->id }}</p>
        <p><strong>Aula:</strong> {{ $mueble->aula->nombre ?? 'No asignado' }}</p>
        <p><strong>Tipo:</strong> {{ $mueble->tipo }}</p>
        <p><strong>Cantidad:</strong> {{ $mueble->cantidad }}</p>
        <p><strong>Estado:</strong> {{ $mueble->estado }}</p>
        <p><strong>Número de Inventario:</strong> {{ $mueble->numero_inventario }}</p>

        <a href="{{ route('muebles.index') }}" class="btn btn-secondary mt-3">← Volver a la lista</a>
    </div>
</div>
@endsection
