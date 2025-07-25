@extends('layouts.app')

@section('content')
<div class="container mt-5">
<a href="{{ route('home') }}" class="btn btn-secondary mb-3">← Volver al inicio</a>

    <h2>Detalles del Aula</h2>

    <div class="card shadow-sm p-4 mb-4">
        <p><strong>Nombre:</strong> {{ $aula->nombre }}</p>
        <p><strong>Ubicación:</strong> {{ $aula->ubicacion ?? 'No especificada' }}</p>
        <p><strong>Capacidad:</strong> {{ $aula->capacidad }}</p>
        <p><strong>Disponibilidad:</strong> {{ $aula->disponibilidad }}</p>
    </div>

    <h3>Focos asignados</h3>
    @if($aula->focos->isEmpty())
        <p>No hay focos asignados a este aula.</p>
    @else
        <ul class="list-group mb-3">
            @foreach($aula->focos as $foco)
                <li class="list-group-item">
                    Código: {{ $foco->codigo }} | Tipo: {{ $foco->tipo }} | Estado: {{ ucfirst($foco->estado) }}
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('aulas.index') }}" class="btn btn-primary">Volver</a>
</div>
@endsection

