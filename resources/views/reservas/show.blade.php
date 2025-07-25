@extends('layouts.app')

@section('title', 'Detalle Reserva')

@section('content')
    <h1>Reserva #{{ $reserva->id }}</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Aula:</strong> {{ $reserva->aula->nombre }}</li>
        <li class="list-group-item"><strong>Docente:</strong> {{ $reserva->docente->nombre }}</li>
        <li class="list-group-item"><strong>Materia:</strong> {{ $reserva->materia->nombre }}</li>
        <li class="list-group-item"><strong>Fecha:</strong> {{ $reserva->fecha }}</li>
        <li class="list-group-item"><strong>Inicio:</strong> {{ $reserva->hora_inicio }}</li>
        <li class="list-group-item"><strong>Fin:</strong> {{ $reserva->hora_fin }}</li>
        <li class="list-group-item"><strong>Tipo Origen:</strong> {{ $reserva->tipo_origen }}</li>
    </ul>

    <a href="{{ route('reservas.index') }}" class="btn btn-secondary mt-3">← Volver</a>
@endsection
