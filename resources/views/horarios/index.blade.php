@extends('layouts.app')

@section('title', 'Horarios')

@section('content')
<div class="container mt-4">
    <h1>Listado de Horarios</h1>

    <a href="{{ route('horarios.create') }}" class="btn btn-success mb-3">Crear nuevo horario</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Materia</th>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Docente</th>
                <th>Aula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($horarios as $horario)
                <tr>
                    <td>{{ $horario->id }}</td>
                    <td>{{ $horario->materia->nombre ?? 'Sin materia' }}</td>
                    <td>{{ ucfirst($horario->dia) }}</td>
                    <td>{{ $horario->hora_inicio }}</td>
                    <td>{{ $horario->hora_fin }}</td>
                    <td>{{ $horario->docente->nombre ?? 'No asignado' }}</td>
                    <td>{{ $horario->aula->nombre ?? 'No asignado' }}</td>
 
                    <td>
                        <a href="{{ route('horarios.edit', $horario) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('horarios.destroy', $horario) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8">No hay horarios registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
