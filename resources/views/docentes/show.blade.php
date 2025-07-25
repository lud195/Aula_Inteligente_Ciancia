@extends('layouts.app')

@section('title', 'Detalle Docente')

@section('content')
<h1>Detalle del Docentes</h1>

<div class="card">
<a href="{{ url()->previous() }}" class="btn btn-outline-secondary">← Atrás</a>

    <div class="card-body">
    <h5 class="card-title">{{ $docente->nombre }}</h5>
<p class="card-text"><strong>Especialidad:</strong> {{ $docente->especialidad ?? 'No definida' }}</p>
<p class="card-text"><strong>Correo:</strong> {{ $docente->correo }}</p>
<p class="card-text"><small class="text-muted">Creado: {{ $docente->created_at->format('d/m/Y H:i') }}</small></p>
<p class="card-text"><small class="text-muted">Actualizado: {{ $docente->updated_at->format('d/m/Y H:i') }}</small></p>

<a href="{{ route('docentes.edit', $docente) }}" class="btn btn-primary">Editar</a>
<a href="{{ route('docentes.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>


@endsection
