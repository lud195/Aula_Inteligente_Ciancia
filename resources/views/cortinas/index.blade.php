@extends('layouts.app')

@section('title', 'Lista de Cortinas')

@section('content')
<h1>Lista de Cortinas</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Botón para crear nueva cortina, fuera del foreach -->
<a href="{{ route('cortinas.create') }}" class="btn btn-primary mb-3">
    Crear nueva cortina
</a>

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
