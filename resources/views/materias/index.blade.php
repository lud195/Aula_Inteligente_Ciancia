@extends('layouts.app')

@section('title', 'Lista de Materias')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Materias</h1>
    <a href="{{ route('materias.create') }}" class="btn btn-success">Nueva Materia</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

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

{{ $materias->links() }}

@else
<p>No hay materias registradas.</p>
@endif
@endsection
