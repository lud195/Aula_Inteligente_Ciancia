@extends('layouts.app')

@section('title', 'Focos')

@section('content')
<div class="container mt-4">

    <!-- Título centrado -->
    <h1 class="text-center mt-5 mb-4">Lista General de Focos</h1>

    <!-- Botón Crear Nuevo Foco alineado a la derecha -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('focos.create') }}" class="btn btn-primary-action">
            <i class="fa-solid fa-plus"></i> Crear Nuevo Foco
        </a>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabla de focos -->
    @if($focos->count())
        <table class="table table-striped">
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
                    <td>{{ optional($foco->aula)->nombre ?? '-' }}</td>
                    <td>{{ $foco->intensidad }}</td>
                    <td>{{ $foco->tipo }}</td>
                    <td>{{ ucfirst($foco->estado) ?? '-' }}</td>
                    <td>
                        <a href="{{ route('focos.show', $foco->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('focos.edit', $foco->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('focos.destroy', $foco->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar foco?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                        <a href="{{ route('focos.historial.index', $foco->id) }}" class="btn btn-secondary btn-sm">Historial</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">No hay focos registrados.</p>
    @endif

</div>
@endsection
