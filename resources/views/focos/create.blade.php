@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Agregar Nuevo Foco</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('focos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
    <label for="codigo" class="form-label">Código del foco</label>
    <input type="text" name="codigo" id="codigo" class="form-control" readonly value="{{ $codigo }}">
</div>


        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" name="tipo" id="tipo" class="form-control" required value="{{ old('tipo') }}">
        </div>

        <div class="mb-3">
            <label for="intensidad" class="form-label">Intensidad</label>
            <input type="number" name="intensidad" id="intensidad" class="form-control" required min="0" max="100" value="{{ old('intensidad') }}">
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="encendido" {{ old('estado') == 'encendido' ? 'selected' : '' }}>Encendido</option>
                <option value="apagado" {{ old('estado') == 'apagado' ? 'selected' : '' }}>Apagado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="aula_id" class="form-label">Aula</label>
            <select name="aula_id" id="aula_id" class="form-select" required>
                <option value="">-- Seleccione un aula --</option>
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}" {{ old('aula_id') == $aula->id ? 'selected' : '' }}>
                        {{ $aula->nombre }} ({{ $aula->ubicacion ?? 'Sin ubicación' }})
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Foco</button>
        <a href="{{ route('focos.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
