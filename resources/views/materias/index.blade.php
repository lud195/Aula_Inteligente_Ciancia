@extends('layouts.app')

@section('title', 'Lista de Materias')

@section('content')
<div class="container mt-4">

    <!-- Título centrado -->
    <h1 class="text-center mt-5 mb-4">Materias</h1>

    <!-- Botón Nueva Materia alineado a la derecha -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('materias.create') }}" class="btn btn-primary-action">
            <i class="fa-solid fa-book-medical"></i> Nueva Materia
        </a>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabla de materias -->
    @if($materias->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Carrera</th>
                    <th>Año</th>
                    <th>Tipo de Cursada</th>
                    <th>Código</th>
                    <th>Docente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materias as $materia)
                <tr>
                    <td>{{ $materia->nombre }}</td>
                    <td>{{ $materia->carrera }}</td>
                    <td>{{ $materia->anio }}</td>
                    <td>{{ $materia->tipo_cursada }}</td>
                    <td>{{ $materia->codigo }}</td>
                    <td>{{ $materia->docente->nombre ?? '-' }}</td>
                    <td>
                        <a href="{{ route('materias.show', $materia) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('materias.edit', $materia) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('materias.destroy', $materia) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que quieres eliminar esta materia?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        {{ $materias->links() }}
    @else
        <p class="text-center">No hay materias registradas.</p>
    @endif

</div>
@endsection
