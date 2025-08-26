@extends('layouts.app')

@section('title', 'Lista de Cortinas')

@section('content')
    <!-- Título centrado con margen superior -->
    <h1 class="text-center mb-4 mt-5">Lista de Cortinas</h1>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Botón para crear nueva cortina alineado a la derecha -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('cortinas.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Crear nueva cortina
        </a>
    </div>

    <!-- Tabla de cortinas -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aula</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cortinas as $cortina)
                <tr>
                    <td>{{ $cortina->id }}</td>
                    <td>{{ $cortina->aula->nombre ?? 'Sin aula' }}</td>
                    <td>{{ $cortina->estado }}</td>
                    <td>
                        <a href="{{ route('cortinas.edit', $cortina) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('cortinas.destroy', $cortina) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro?')" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
