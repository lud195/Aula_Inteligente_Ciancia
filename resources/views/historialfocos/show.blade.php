@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Historial de Foco</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $historialfoco->id }}</li>
        <li class="list-group-item"><strong>Foco:</strong> {{ $historialfoco->foco->codigo ?? 'N/A' }} - {{ $historialfoco->foco->ubicacion ?? '' }}</li>
        <li class="list-group-item"><strong>Fecha de Cambio:</strong> {{ $historialfoco->fecha_cambio->format('Y-m-d') }}</li>
        <li class="list-group-item"><strong>Acción:</strong> {{ ucfirst($historialfoco->accion) }}</li>
        <li class="list-group-item"><strong>Hora Inicio:</strong> {{ $historialfoco->hora_inicio ?? '-' }}</li>
        <li class="list-group-item"><strong>Hora Fin:</strong> {{ $historialfoco->hora_fin ?? '-' }}</li>
        <li class="list-group-item"><strong>Estado:</strong> {{ $historialfoco->estado ? 'Activo' : 'Inactivo' }}</li>
    </ul>

    <a href="{{ route('historialfocos.edit', $historialfoco) }}" class="btn btn-warning mt-3">Editar</a>
    <a href="{{ route('historialfocos.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
