@extends('layouts.app')

@section('title', 'Horarios')

@section('content')
<div class="container mt-5 mb-10">

    <!-- Título y botón -->
    <h1 class="text-center mb-4">Listado de Horarios</h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('horarios.create') }}" class="btn btn-primary-action">
            <i class="fa-solid fa-calendar-plus"></i> Crear nuevo horario
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabla CRUD -->
    <table class="table table-bordered mx-auto" style="max-width: 1000px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Materia</th>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Docente</th>
                <th>Aula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($horarios as $horario)
                <tr>
                    <td>{{ $horario->id }}</td>
                    <td>{{ $horario->materia->nombre ?? 'Sin materia' }}</td>
                    <td>{{ ucfirst($horario->dia) }}</td>
                    <td>{{ $horario->hora_inicio }}</td>
                    <td>{{ $horario->hora_fin }}</td>
                    <td>{{ $horario->docente->nombre ?? 'No asignado' }}</td>
                    <td>{{ $horario->aula->nombre ?? 'No asignado' }}</td>
                    <td>
                        <a href="{{ route('horarios.edit', $horario) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('horarios.destroy', $horario) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No hay horarios registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tabla visual -->
    <div class="mx-auto p-6 bg-pink-50 rounded-lg shadow-lg mt-5" style="max-width: 1000px;">
    &nbsp;

        <h2 class="text-2xl font-bold mb-4 text-center text-pink-700">Horario Visual</h2>

        <table class="table-auto w-full border border-pink-200 text-center mx-auto table-visual">
            <thead>
                <tr class="bg-pink-300 text-white">
                    <th class="px-4 py-2">Hora</th>
                    <th class="px-4 py-2">Lunes</th>
                    <th class="px-4 py-2">Martes</th>
                    <th class="px-4 py-2">Miércoles</th>
                    <th class="px-4 py-2">Jueves</th>
                    <th class="px-4 py-2">Viernes</th>
                </tr>
            </thead>
            <tbody>
                @php
                    use Carbon\Carbon;

                    $dias = ['Lunes','Martes','Miércoles','Jueves','Viernes'];
                    $franjas = [
                        '7:00-7:40',
                        '7:40-8:15',
                        '8:25-9:05',
                        '9:05-9:40',
                        '9:50-10:30',
                        '10:30-11:05',
                        '11:15-11:55',
                        '11:55-12:30'
                    ];
                @endphp

                @foreach($franjas as $franja)
                    <tr>
                        <td class="border px-3 py-2 font-semibold">{{ $franja }}</td>
                        @foreach($dias as $dia)
                            @php
                                $clase = $horarios->first(function($h) use ($dia, $franja) {
                                    list($inicio_fr, $fin_fr) = explode('-', $franja);
                                    $inicio_fr = Carbon::parse(trim($inicio_fr));
                                    $fin_fr = Carbon::parse(trim($fin_fr));

                                    $inicio_h = Carbon::parse($h->hora_inicio);
                                    $fin_h = Carbon::parse($h->hora_fin);

                                    return ucfirst($h->dia) == $dia && $inicio_h < $fin_fr && $fin_h > $inicio_fr;
                                });
                            @endphp
                            <td class="border px-3 py-2 relative group">
                                @if($clase)
                                    <div class="clase bg-pink-500 text-white rounded px-2 py-1 cursor-pointer">
                                        <p class="mb-0 font-semibold text-sm">{{ $clase->materia->nombre ?? 'Sin materia' }}</p>
                                        <p class="mb-0 text-xs">{{ $clase->docente->nombre ?? 'No asignado' }}</p>
                                        <p class="mb-0 text-xs">{{ $clase->aula->nombre ?? 'No asignado' }}</p>
                                    </div>
                                    <div class="tooltip absolute left-1/2 transform -translate-x-1/2 top-full mt-1 w-52 bg-white border border-pink-300 rounded shadow-lg p-2 text-left text-sm z-50 hidden group-hover:block">
                                        <p><strong>Materia:</strong> {{ $clase->materia->nombre ?? 'Sin materia' }}</p>
                                        <p><strong>Docente:</strong> {{ $clase->docente->nombre ?? 'No asignado' }}</p>
                                        <p><strong>Aula:</strong> {{ $clase->aula->nombre ?? 'No asignado' }}</p>
                                    </div>
                                @else
                                    <span class="text-pink-400">-</span>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach

            </tbody>
        </table>
        &nbsp;

    </div>

</div>

<style>
.table-visual th {
    background-color: #f687b3;
    color: white;
    padding: 10px;
    font-size: 16px;
}
.table-visual td {
    border: 1px solid #fbb6ce;
    padding: 6px;
    min-width: 90px;
    font-size: 13px;
    vertical-align: middle;
}
.table-visual .clase {
    background-color: #ec4899;
    border-radius: 5px;
    padding: 4px 6px;
    cursor: pointer;
    display: inline-block;
    text-align: center;
}
.table-visual .clase p {
    margin: 0;
    line-height: 1.2;
}
.table-visual .tooltip {
    display: none;
}
.table-visual td:hover .tooltip {
    display: block;
}
</style>

@endsection
