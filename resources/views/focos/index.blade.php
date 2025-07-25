@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Focos</h1>

    <a href="{{ route('focos.create', ['aula' => $aula->id]) }}" class="btn btn-primary mb-3">
        Crear Nuevo Foco
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Ubicación</th>
                <th>Intensidad</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Aula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($focos as $foco)
            <tr>
                <td>{{ $foco->id }}</td>
                <td>{{ $foco->codigo }}</td>
                <td>{{ $foco->ubicacion }}</td>
                <td>{{ $foco->intensidad }}</td>
                <td>{{ $foco->tipo }}</td>
                <td>{{ $foco->estado ? 'Encendido' : 'Apagado' }}</td>
                <td>{{ $foco->aula->nombre ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('focos.show', ['aula' => $foco->aula_id, 'foco' => $foco->id]) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('focos.edit', ['aula' => $foco->aula_id, 'foco' => $foco->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('focos.destroy', ['aula' => $foco->aula_id, 'foco' => $foco->id]) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar foco?')">Eliminar</button>
                    </form>
                    <a href="{{ route('historialfocos.index', ['aula' => $foco->aula_id, 'foco' => $foco->id]) }}" class="btn btn-secondary btn-sm">Historial</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('home') }}" class="btn btn-secondary mt-4">⬅️ Volver al inicio</a>
</div>
@endsection
