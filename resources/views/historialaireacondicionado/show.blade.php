@extends('layouts.app')

@section('title', 'Detalle Historial')

@section('content')
<div class="container">
    <h1>Detalle de historial</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $historial->id }}</li>
        <li class="list-group-item"><strong>Aula:</strong> {{ $historial->aireAcondicionado->aula_id ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Fecha:</strong> {{ $historial->fecha_uso }}</li>
        <li class="list-group-item"><strong>Acción:</strong> {{ $historial->accion }}</li>
    </ul>

    <a href="{{ route('historial_aire.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
</div>
@endsection
