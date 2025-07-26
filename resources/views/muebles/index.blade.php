@extends('layouts.app')

@section('title', 'Lista de Muebles')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Lista de Muebles</h1>
    <a href="{{ route('muebles.create') }}" class="btn btn-success">+ Crear nuevo mueble</a>
</div>

@if($muebles->count())
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
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
                <td>{{ $mueble->aula->nombre ?? 'No asignado' }}</td>
                <td>{{ $mueble->tipo }}</td>
                <td>{{ $mueble->cantidad }}</td>
                <td>{{ $mueble->estado }}</td>
                <td>{{ $mueble->numero_inventario }}</td>
                <td>
                    <a href="{{ route('muebles.show', $mueble) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('muebles.edit', $mueble) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('muebles.destroy', $mueble) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('¿Eliminar este mueble?')" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<p>No hay muebles registrados.</p>
@endif
@endsection
