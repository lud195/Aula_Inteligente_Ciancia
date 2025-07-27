@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Foco</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $foco->id }}</li>
        <li class="list-group-item"><strong>Código:</strong> {{ $foco->codigo }}</li>
        <li class="list-group-item"><strong>Aula:</strong> {{ $foco->aula->nombre ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Intensidad:</strong> {{ $foco->intensidad }}</li>
        <li class="list-group-item"><strong>Tipo:</strong> {{ $foco->tipo }}</li>
        <li class="list-group-item"><strong>Estado:</strong> {{ $foco->estado ? 'Encendido' : 'Apagado' }}</li>
    </ul>

    <a href="{{ route('focos.edit', $foco) }}" class="btn btn-warning mt-3">Editar</a>
    <a href="{{ route('focos.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
