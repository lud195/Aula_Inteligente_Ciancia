@extends('layouts.app')

@section('title', 'Detalle Registro de Historial')

@section('content')
<div class="container p-4 bg-white rounded shadow-sm">
    <h1>Detalle Registro ID: {{ $historial->id }} - Aire ID: {{ $aireacondicionado->id }}</h1>

    <a href="{{ route('historialaireacondicionado.index', $aireacondicionado->id) }}" class="btn btn-secondary mb-3">Volver al Historial</a>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $historial->id }}</td>
        </tr>
        <tr>
            <th>Fecha</th>
            <td>{{ $historial->fecha }}</td>
        </tr>
        <tr>
            <th>Hora Inicio</th>
            <td>{{ $historial->hora_inicio }}</td>
        </tr>
        <tr>
            <th>Hora Fin</th>
            <td>{{ $historial->hora_fin ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Temperatura</th>
            <td>{{ $historial->temperatura ?? 'N/A' }}</td>
        </tr>
    </table>
</div>
@endsection
