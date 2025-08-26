@extends('layouts.app')

@section('title', 'Detalle de Materia')

@section('content')
<div class="container mt-4">
    

    <h1>{{ $materia->nombre }}</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Código:</strong> {{ $materia->codigo }}</p>
            <p><strong>Carrera:</strong> {{ $materia->carrera }}</p>
            <p><strong>Año:</strong>
                @php
                    $nombres = [1 => '1ro', 2 => '2do', 3 => '3ro', 4 => '4to', 5 => '5to'];
                @endphp
                {{ $nombres[$materia->anio] ?? $materia->anio }}
            </p>
            <p><strong>Tipo de Cursada:</strong> {{ $materia->tipo_cursada }}</p>
            <p><strong>Docente:</strong> {{ $materia->docente->nombre ?? 'Sin asignar' }}</p>
            <p><strong>Creado:</strong> {{ $materia->created_at->format('d/m/Y') }}</p>
        </div>
    </div>

    <a href="{{ route('materias.index') }}" class="btn btn-secondary mt-3">Volver</a>
    <a href="{{ route('materias.edit', $materia) }}" class="btn btn-primary mt-3">Editar</a>
</div>
@endsection
