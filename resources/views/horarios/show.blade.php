@extends('layouts.app')

@section('title', 'Detalle del Horario')

@section('content')
    <h1>Horario de {{ $horario->materia->nombre }}</h1>

    <ul>
        <li><strong>Día:</strong> {{ ucfirst($horario->dia) }}</li>
        <li><strong>Inicio:</strong> {{ $horario->hora_inicio }}</li>
        <li><strong>Fin:</strong> {{ $horario->hora_fin }}</li>
        <li><strong>Docente:</strong> {{ $horario->reserva?->docente?->nombre ?? 'Sin asignar' }}</li>
        <li><strong>Aula:</strong> {{ $horario->reserva?->aula?->nombre ?? 'Sin asignar' }}</li>
    </ul>

    <a href="{{ route('horarios.index') }}" class="btn btn-secondary">← Volver</a>
@endsection
