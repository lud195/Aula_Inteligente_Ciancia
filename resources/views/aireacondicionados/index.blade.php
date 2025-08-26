@extends('layouts.app')

@section('title', 'Aires Acondicionados')

@section('content')
<div class="container p-4 bg-white rounded shadow-sm">

    <!-- Título centrado con margen superior -->
    <h1 class="text-center mt-5 mb-4">Aires Acondicionados</h1>

    <!-- Botón alineado a la derecha -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('aireacondicionados.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Agregar Nuevo Aire Acondicionado
        </a>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabla de aires acondicionados -->
    @if($aires->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Aula</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Estado</th>
                    <th>Mantenimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($aires as $aireacondicionado)
                    <tr>
                        <td>{{ $aireacondicionado->id }}</td>
                        <td>{{ $aireacondicionado->aula_id }}</td>
                        <td>{{ $aireacondicionado->marca }}</td>
                        <td>{{ $aireacondicionado->modelo }}</td>
                        <td>{{ $aireacondicionado->estado }}</td>
                        <td>{{ $aireacondicionado->mantenimiento }}</td>
                        <td>
                            <a href="{{ route('aireacondicionados.show', $aireacondicionado->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('aireacondicionados.edit', $aireacondicionado->id) }}" class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('aireacondicionados.destroy', $aireacondicionado->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este aire acondicionado?')">Eliminar</button>
                            </form>

                            <a href="{{ route('historialaireacondicionado.index', $aireacondicionado->id) }}" class="btn btn-info btn-sm">Historial</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay aires acondicionados registrados.</p>
    @endif

</div>
@endsection
