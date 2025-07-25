@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Historial de Focos</h1>

    <a href="{{ route('historialfocos.create') }}" class="btn btn-primary mb-3">Agregar Registro</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Foco</th>
                <th>Fecha Cambio</th>
                <th>Acción</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historialfocos as $hf)
            <tr>
                <td>{{ $hf->id }}</td>
                <td>{{ $hf->foco->codigo ?? 'N/A' }}</td>
                <td>{{ $hf->fecha_cambio->format('Y-m-d') }}</td>
                <td>{{ ucfirst($hf->accion) }}</td>
                <td>{{ $hf->hora_inicio ?? '-' }}</td>
                <td>{{ $hf->hora_fin ?? '-' }}</td>
                <td>{{ $hf->estado ? 'Activo' : 'Inactivo' }}</td>
                <td>
                    <a href="{{ route('historialfocos.show', $hf) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('historialfocos.edit', $hf) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('historialfocos.destroy', $hf) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar historial?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
