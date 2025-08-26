@extends('layouts.app')

@section('title', 'Lista de Docentes')

@section('content')
    <!-- Título centrado con margen superior -->
    <h1 class="text-center mt-5 mb-4">Docentes</h1>

    <!-- Botón alineado a la derecha -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('docentes.create') }}" class="btn btn-primary-action">
            <i class="fa-solid fa-user-plus"></i> Nuevo Docente
        </a>
    </div>

    @if($docentes->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($docentes as $docente)
                <tr>
                    <td>{{ $docente->nombre }}</td>
                    <td>{{ $docente->especialidad ?? '-' }}</td>
                    <td>{{ $docente->correo }}</td>
                    <td>
                        <a href="{{ route('docentes.show', $docente) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('docentes.destroy', $docente) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que quieres eliminar este docente?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación -->
        {{ $docentes->links() }}

    @else
        <p>No hay docentes registrados.</p>
    @endif

@endsection
