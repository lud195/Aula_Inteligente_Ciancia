@extends('layouts.app') {{-- elimina esta línea si no usas layouts --}}

@section('content')
<div class="container">
    <h1 style="text-align:center;">📅 Disponibilidades</h1>

    <div style="margin-bottom: 2rem;">
        <h2>✅ Aulas disponibles sin horario asignado</h2>
        @if($aulasDisponibles->count())
            <ul>
                @foreach($aulasDisponibles as $aula)
                    <li><strong>{{ $aula->nombre }}</strong></li>
                @endforeach
            </ul>
        @else
            <p>No hay aulas disponibles sin horario asignado.</p>
        @endif
    </div>

    <div style="margin-bottom: 2rem;">
        <h2>👨‍🏫 Docentes disponibles</h2>
        @if($docentesDisponibles->count())
            <ul>
                @foreach($docentesDisponibles as $docente)
                    <li><strong>{{ $docente->nombre }}</strong></li>
                @endforeach
            </ul>
        @else
            <p>No hay docentes disponibles.</p>
        @endif
    </div>

    <div>
        <h2>📋 Lista de disponibilidades asignadas</h2>
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%;">
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
                    <td>{{ $disp->aula->nombre ?? 'Sin asignar' }}</td>
                    <td>{{ $disp->docente->nombre ?? 'Sin docente' }}</td>
                    <td>{{ ucfirst($disp->estado) }}</td>
                    <td>{{ $disp->hora }}</td>
                    <td>{{ $disp->fecha }}</td>
                    <td>
                        <a href="{{ route('disponibilidades.edit', $disp->id) }}">Editar</a>
                        <form action="{{ route('disponibilidades.destroy', $disp->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro quieres eliminar esta disponibilidad?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
