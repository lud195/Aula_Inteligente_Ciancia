@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Foco</h1>

    <form action="{{ route('focos.update', $foco) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input type="text" name="codigo" id="codigo" class="form-control" required value="{{ old('codigo', $foco->codigo) }}">
        </div>

        <div class="form-group mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" name="ubicacion" id="ubicacion" class="form-control" required value="{{ old('ubicacion', $foco->ubicacion) }}">
        </div>

        <div class="form-group mb-3">
            <label for="intensidad" class="form-label">Intensidad</label>
            <input type="number" name="intensidad" id="intensidad" class="form-control" required min="0" max="100" value="{{ old('intensidad', $foco->intensidad) }}">
        </div>

        <div class="form-group mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" name="tipo" id="tipo" class="form-control" required value="{{ old('tipo', $foco->tipo) }}">
        </div>

        <div class="form-group mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="1" {{ old('estado', $foco->estado) == 1 ? 'selected' : '' }}>Encendido</option>
                <option value="0" {{ old('estado', $foco->estado) == 0 ? 'selected' : '' }}>Apagado</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="aula_id" class="form-label">Aula</label>
            <select name="aula_id" id="aula_id" class="form-select" required>
                @foreach($aulas as $aulaItem)
                    <option value="{{ $aulaItem->id }}" {{ old('aula_id', $foco->aula_id) == $aulaItem->id ? 'selected' : '' }}>
                        {{ $aulaItem->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary" type="submit">Actualizar</button>
        <a href="{{ route('focos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
