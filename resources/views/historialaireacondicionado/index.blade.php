@extends('layouts.app')

@section('title', 'Historial de Uso de A/A')

@section('content')
<div class="container">
    <h1>Historial de uso de aire acondicionado</h1>

    <a href="{{ route('historial_aire.create') }}" class="btn btn-primary mb-3">Registrar nuevo uso</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aula</th>
                <th>Fecha</th>
                <th>Acción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historial as $registro)
                <tr>
                    <td>{{ $registro->id }}</td>
                    <td>{{ $registro->aireAcondicionado->aula_id ?? 'N/A' }}</td>
                    <td>{{ $registro->fecha_uso }}</td>
                    <td>{{ $registro->accion }}</td>
                    <td>
                        <a href="{{ route('historial_aire.show', $registro->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('historial_aire.edit', $registro->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('historial_aire.destroy', $registro->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
