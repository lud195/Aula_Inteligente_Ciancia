@extends('layouts.app')

@section('title', 'Reservas')

@section('content')
<div class="container mt-4">

    <!-- Título centrado -->
    <h1 class="text-center mt-5 mb-4">Reservas</h1>

    <!-- Botón Nueva Reserva alineado a la derecha -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('reservas.create') }}" class="btn btn-primary-action">
            <i class="fa-solid fa-calendar-plus"></i> Nueva Reserva
        </a>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabla de reservas -->
    @if($reservas->count())
        <table class="table table-striped">
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
                    <td>{{ optional($reserva->aula)->nombre ?? '-' }}</td>
                    <td>{{ optional($reserva->docente)->nombre ?? '-' }}</td>
                    <td>{{ optional($reserva->materia)->nombre ?? '-' }}</td>
                    <td>{{ $reserva->fecha }}</td>
                    <td>{{ $reserva->hora_inicio }}</td>
                    <td>{{ $reserva->hora_fin }}</td>
                    <td>{{ $reserva->tipo_origen }}</td>
                    <td>
                        <a href="{{ route('reservas.show', $reserva) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta reserva?');">
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
        <p class="text-center">No hay reservas registradas.</p>
    @endif

</div>
@endsection
