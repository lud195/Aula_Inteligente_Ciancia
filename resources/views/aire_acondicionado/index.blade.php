@extends('layouts.app')

@section('title', 'Aires Acondicionados')

@section('content')
<div class="container p-4 bg-white rounded shadow-sm">
    <h1>Aires Acondicionados</h1>

    <a href="{{ route('aireacondicionados.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Aire Acondicionado</a>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
                @foreach($aires as $aire)
                    <tr>
                        <td>{{ $aire->id }}</td>
                        <td>{{ $aire->aula_id }}</td>
                        <td>{{ $aire->marca }}</td>
                        <td>{{ $aire->modelo }}</td>
                        <td>{{ $aire->estado }}</td>
                        <td>{{ $aire->mantenimiento }}</td>
                        <td>
                            <a href="{{ route('aireacondicionados.show', $aire->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('aireacondicionados.edit', $aire->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            {{-- Opcional: botón para eliminar --}}
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
