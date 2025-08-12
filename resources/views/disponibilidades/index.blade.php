@extends('layouts.app')

@section('title', 'Disponibilidades')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">📅 Gestión de Disponibilidades</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('disponibilidades.create') }}" class="btn btn-primary">+ Nueva Disponibilidad</a>
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
                        <li class="list-group-item">{{ $aula->nombre }}</li>
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
                        <li class="list-group-item">{{ $docente->nombre }}</li>
                    @endforeach
                </ul>
            @else
                <p>No hay docentes disponibles.</p>
            @endif
        </div>
    </div>

    <h4>Lista de disponibilidades asignadas</h4>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
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
            @forelse($disponibilidades as $disp)
            <tr>
                <td>{{ $disp->id }}</td>
                <td>{{ $disp->aula->nombre ?? 'Sin asignar' }}</td>
                <td>{{ $disp->docente->nombre ?? 'Sin docente' }}</td>
                <td>
                    @if($disp->estado == 'disponible')
                        <span class="badge bg-success text-uppercase">{{ $disp->estado }}</span>
                    @elseif($disp->estado == 'ocupado')
                        <span class="badge bg-danger text-uppercase">{{ $disp->estado }}</span>
                    @else
                        <span class="badge bg-secondary text-uppercase">{{ $disp->estado }}</span>
                    @endif
                </td>
                <td>{{ $disp->hora }}</td>
                <td>{{ \Carbon\Carbon::parse($disp->fecha)->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('disponibilidades.edit', $disp->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('disponibilidades.destroy', $disp->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta disponibilidad?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No hay disponibilidades registradas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
