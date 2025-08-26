@extends('layouts.app')

@section('title', 'Disponibilidades')

@section('content')
<div class="container mt-4">

    <!-- Título centrado -->
    <h1 class="text-center mt-5 mb-4">
        <i class="fa-solid fa-calendar-days" style="color: #FF8DA1;"></i> Gestión de Disponibilidades
    </h1>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Botón Nueva Disponibilidad alineado a la derecha -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('disponibilidades.create') }}" class="btn btn-primary-action">
            <i class="fa-solid fa-plus"></i> Nueva Disponibilidad
        </a>
    </div>

    {{-- Filtros --}}
    <form method="GET" action="{{ route('disponibilidades.index') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <select name="estado" class="form-select">
                <option value="">-- Filtrar por estado --</option>
                <option value="disponible" {{ request('estado') == 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="ocupado" {{ request('estado') == 'ocupado' ? 'selected' : '' }}>Ocupado</option>
                <option value="mantenimiento" {{ request('estado') == 'mantenimiento' ? 'selected' : '' }}>En mantenimiento</option>
            </select>
        </div>
        <div class="col-md-4">
            <select name="docente_id" class="form-select">
                <option value="">-- Filtrar por docente --</option>
                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}" {{ request('docente_id') == $docente->id ? 'selected' : '' }}>
                        {{ $docente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-secondary w-100">Filtrar</button>
        </div>
    </form>

    <div class="row mb-4">
        <div class="col-md-6">
            <h4>Aulas disponibles sin horario asignado</h4>
            @if($aulasDisponibles->count())
                <ul class="list-group">
                    @foreach($aulasDisponibles as $aula)
                        <li class="list-group-item">{{ $aula->nombre ?? '-' }}</li>
                    @endforeach
                </ul>
            @else
                <p>No hay aulas disponibles sin horario asignado.</p>
            @endif
        </div>
        <div class="col-md-6">
            <h4>Docentes disponibles</h4>
            @if($docentesDisponibles->count())
                <ul class="list-group">
                    @foreach($docentesDisponibles as $docente)
                        <li class="list-group-item">{{ $docente->nombre ?? '-' }}</li>
                    @endforeach
                </ul>
            @else
                <p>No hay docentes disponibles.</p>
            @endif
        </div>
    </div>

    <h4>Lista de disponibilidades asignadas</h4>
    @if($disponibilidades->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Aula</th>
                    <th>Docente</th>
                    <th>Estado</th>
                    <th>Hora</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($disponibilidades as $disp)
                <tr>
                    <td>{{ $disp->id }}</td>
                    <td>{{ optional($disp->aula)->nombre ?? '-' }}</td>
                    <td>{{ optional($disp->docente)->nombre ?? '-' }}</td>
                    <td>
                        @if($disp->estado == 'disponible')
                            <span class="badge bg-success text-uppercase">{{ $disp->estado }}</span>
                        @elseif($disp->estado == 'ocupado')
                            <span class="badge bg-danger text-uppercase">{{ $disp->estado }}</span>
                        @else
                            <span class="badge bg-secondary text-uppercase">{{ $disp->estado }}</span>
                        @endif
                    </td>
                    <td>{{ $disp->hora ?? '-' }}</td>
                    <td>{{ $disp->fecha ? \Carbon\Carbon::parse($disp->fecha)->format('d/m/Y') : '-' }}</td>
                    <td>
                        <a href="{{ route('disponibilidades.edit', $disp->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('disponibilidades.destroy', $disp->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar esta disponibilidad?');">
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
        <p class="text-center">No hay disponibilidades registradas.</p>
    @endif

</div>
@endsection
