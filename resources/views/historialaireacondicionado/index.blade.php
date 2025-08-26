@extends('layouts.app')

@section('title', 'Historial del Aire Acondicionado')

@section('content')
<div class="container p-4 bg-white rounded shadow-sm">

    <!-- Título centrado con margen superior e inferior -->
    <h1 class="text-center mt-5 mb-4">
        Historial del Aire ID: {{ $aireacondicionado->id }}
    </h1>

    <!-- Botones alineados a la derecha -->
    <div class="d-flex justify-content-end mb-3 gap-2">
        <a href="{{ route('aireacondicionados.show', $aireacondicionado->id) }}" class="btn btn-secondary">
            ← Volver al detalle del Aire
        </a>
        <a href="{{ route('historialaireacondicionados.create', $aireacondicionado->id) }}" class="btn btn-primary-action">
            <i class="fa-solid fa-file-circle-plus"></i> Agregar Registro al Historial
        </a>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabla de historial -->
    @if($historial->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Temperatura</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($historial as $registro)
                    <tr>
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->fecha }}</td>
                        <td>{{ $registro->hora_inicio }}</td>
                        <td>{{ $registro->hora_fin ?? 'N/A' }}</td>
                        <td>{{ $registro->temperatura ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('historialaireacondicionados.show', [$aireacondicionado->id, $registro->id]) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('historialaireacondicionados.edit', [$aireacondicionado->id, $registro->id]) }}" class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('historialaireacondicionados.destroy', [$aireacondicionado->id, $registro->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro que quieres eliminar este registro?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">No hay registros en el historial aún.</p>
    @endif
</div>
@endsection
