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
                <th>Aula</th>
                <th>Intensidad</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($focos as $foco)
            <tr>
                <td>{{ $foco->id }}</td>
                <td>{{ $foco->codigo }}</td>
                <td>{{ $foco->aula->nombre ?? 'N/A' }}</td>
                <td>{{ $foco->intensidad }}</td>
                <td>{{ $foco->tipo }}</td>
                <td>{{ $foco->estado ? 'Encendido' : 'Apagado' }}</td>
                <td>
                    <!-- Botón Ver -->
                    <a href="{{ route('focos.show', $foco->id) }}" class="btn btn-info btn-sm">Ver</a>

                    <!-- Botón Editar -->
                    <a href="{{ route('focos.edit', $foco->id) }}" class="btn btn-warning btn-sm">Editar</a>

                    <!-- Botón Eliminar -->
                    <form action="{{ route('focos.destroy', $foco->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar foco?')">Eliminar</button>
                    </form>

                    <!-- Botón Historial -->
                    <a href="{{ route('focos.historial.index', $foco->id) }}" class="btn btn-secondary btn-sm">Historial</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
