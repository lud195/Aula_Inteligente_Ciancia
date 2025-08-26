@extends('layouts.app')

@section('title', 'Listado de Aulas')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Listado de Aulas</h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('aulas.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Agregar Aula
        </a>
    </div>

    @if($aulas->count())
        <div class="row">
            @foreach($aulas as $aula)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-3">
                                <i class="fa-solid fa-school"></i> {{ $aula->nombre }}
                            </h5>
                            <p class="card-text">
                                <strong><i class="fa-solid fa-location-dot"></i> Ubicación:</strong> {{ $aula->ubicacion ?? 'Sin ubicación' }}<br>
                                <strong><i class="fa-solid fa-users"></i> Capacidad:</strong> {{ $aula->capacidad ?? 'No definida' }}
                            </p>
                            <div class="d-flex justify-content-center gap-2 mt-3">
                                <a href="{{ route('aulas.show', $aula) }}" class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-eye"></i> Ver
                                </a>
                                <a href="{{ route('aulas.edit', $aula) }}" class="btn btn-edit btn-sm">
    <i class="fa-solid fa-pen-to-square"></i> Editar
</a>

<form action="{{ route('aulas.destroy', $aula) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button class="btn btn-delete btn-sm" onclick="return confirm('¿Eliminar aula?')">
        <i class="fa-solid fa-trash"></i> Eliminar
    </button>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación Bootstrap -->
        <div class="d-flex justify-content-center mt-4">
            {{ $aulas->links('pagination::bootstrap-5') }}
        </div>
    @else
        <p class="text-center">No hay aulas registradas aún.</p>
    @endif


</div>
@endsection
