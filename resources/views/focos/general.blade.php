@extends('layouts.app')

@section('title', 'Listado General de Focos')

@section('content')
<div class="container">
    <h1>Listado General de Focos</h1>

    <a href="{{ route('focos.createGeneral') }}" class="btn btn-success mb-3">Crear Nuevo Foco</a>

    @if($focos->isEmpty())
        <p>No hay focos registrados.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Ubicación</th>
                    <th>Intensidad</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Aula</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($focos as $foco)
                <tr>
                    <td>{{ $foco->id }}</td>
                    <td>{{ $foco->codigo }}</td>
                    <td>{{ $foco->ubicacion }}</td>
                    <td>{{ $foco->intensidad }}</td>
                    <td>{{ $foco->tipo }}</td>
                    <td>{{ $foco->estado ? 'Encendido' : 'Apagado' }}</td>
                    <td>{{ $foco->aula->nombre ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('focos.editGeneral', $foco->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('focos.destroyGeneral', $foco->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('¿Eliminar foco?')" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
