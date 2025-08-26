@extends('layouts.app')

@section('title', 'Lista de Muebles')

@section('content')
<div class="container mt-4">

    <!-- Título centrado -->
    <h1 class="text-center mt-5 mb-4">Lista de Muebles</h1>

    <!-- Botón Crear Mueble alineado a la derecha -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('muebles.create') }}" class="btn btn-primary-action">
            <i class="fa-solid fa-couch"></i> Crear nuevo mueble
        </a>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabla de muebles -->
    @if($muebles->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Aula</th>
                    <th>Tipo</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Inventario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($muebles as $mueble)
                <tr>
                    <td>{{ $mueble->id }}</td>
                    <td>{{ optional($mueble->aula)->nombre ?? '-' }}</td>
                    <td>{{ $mueble->tipo ?? '-' }}</td>
                    <td>{{ $mueble->cantidad ?? '-' }}</td>
                    <td>{{ $mueble->estado ?? '-' }}</td>
                    <td>{{ $mueble->numero_inventario ?? '-' }}</td>
                    <td>
                        <a href="{{ route('muebles.show', $mueble) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('muebles.edit', $mueble) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('muebles.destroy', $mueble) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este mueble?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">No hay muebles registrados.</p>
    @endif

</div>
@endsection
