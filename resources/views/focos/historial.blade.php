@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Historial del foco: {{ $foco->codigo }} (Aula: {{ $aula->nombre ?? 'Sin aula' }})</h1>
    
    @php
    $rutaVolver = isset($aula) ? route('aulas.focos.index', $aula->id) : route('focos.index');
@endphp

<a href="{{ $rutaVolver }}" class="btn btn-secondary mb-3">← Volver a la lista de focos</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Fecha Cambio</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Acción</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @forelse($historiales as $historial)
            <tr>
                <td>{{ $historial->fecha_cambio }}</td>
                <td>{{ $historial->hora_inicio }}</td>
                <td>{{ $historial->hora_fin }}</td>
                <td>{{ $historial->accion }}</td>
                <td>{{ ucfirst($historial->estado) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No hay registros de historial para este foco.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
