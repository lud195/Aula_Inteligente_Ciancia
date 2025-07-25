@extends('layouts.app')

@section('title', 'Reservas')

@section('content')
    <h1>Listado de Reservas</h1>

    <a href="{{ route('reservas.create') }}" class="btn btn-primary mb-3">Nueva Reserva</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aula</th>
                <th>Docente</th>
                <th>Materia</th>
                <th>Fecha</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Tipo Origen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
    @foreach($reservas as $reserva)
    <tr>
        <td>{{ $reserva->id }}</td>
        <td>{{ optional($reserva->aula)->nombre ?? 'Sin aula asignada' }}</td>
        <td>{{ optional($reserva->docente)->nombre ?? 'Sin docente asignado' }}</td>
        <td>{{ optional($reserva->materia)->nombre ?? 'Sin materia asignada' }}</td>
        <td>{{ $reserva->fecha }}</td>
        <td>{{ $reserva->hora_inicio }}</td>
        <td>{{ $reserva->hora_fin }}</td>
        <td>{{ $reserva->tipo_origen }}</td>
        <td>
            <a href="{{ route('reservas.show', $reserva) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta reserva?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>

    </table>
@endsection
