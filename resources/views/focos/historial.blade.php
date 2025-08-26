@extends('layouts.app')

@section('title', 'Historial del Foco')

@section('content')
<div class="container mt-4">

    <!-- Título centrado -->
    <h1 class="text-center mt-5 mb-4">
        Historial del foco: 
    </h1>

    @php
        $rutaVolver = isset($aula) ? route('aulas.focos.index', $aula->id) : route('focos.index');
    @endphp

    <!-- Botón Volver alineado a la derecha -->
    <div class="d-flex justify-content-end mb-3">
    <a href="{{ $rutaVolver }}" class="btn btn-secondary">
    ← Volver 
</a>

    </div>

    <!-- Tabla de historial -->
    @if($historiales->count())
        <table class="table table-striped">
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
                @foreach($historiales as $historial)
                <tr>
                    <td>{{ $historial->fecha_cambio ?? '-' }}</td>
                    <td>{{ $historial->hora_inicio ?? '-' }}</td>
                    <td>{{ $historial->hora_fin ?? '-' }}</td>
                    <td>{{ $historial->accion ?? '-' }}</td>
                    <td>{{ ucfirst($historial->estado) ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">No hay registros de historial para este foco.</p>
    @endif

</div>
@endsection
