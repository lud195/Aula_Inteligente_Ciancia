@extends('layouts.app')

@section('title', 'Editar Cortina')

@section('content')
<h1>Editar Cortina</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('cortinas.update', $cortina) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="mb-3">
        <label for="aula_id" class="form-label">Ubicación (Aula)</label>
        <select name="aula_id" id="aula_id" class="form-select" required>
            <option value="" disabled>Selecciona un aula</option>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}" {{ ($aula->id == old('aula_id', $cortina->aula_id)) ? 'selected' : '' }}>
                    {{ $aula->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select name="estado" id="estado" class="form-select" required>
            <option value="" disabled>Selecciona un estado</option>
            <option value="roto" {{ old('estado', $cortina->estado) == 'roto' ? 'selected' : '' }}>Roto</option>
            <option value="bien" {{ old('estado', $cortina->estado) == 'bien' ? 'selected' : '' }}>Bien</option>
            <option value="nuevo" {{ old('estado', $cortina->estado) == 'nuevo' ? 'selected' : '' }}>Nuevo</option>
            <option value="en reparacion" {{ old('estado', $cortina->estado) == 'en reparacion' ? 'selected' : '' }}>En reparación</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="nivel_cortina" class="form-label">Nivel de la cortina</label>
        <select name="nivel_cortina" id="nivel_cortina" class="form-select" required>
            <option value="" disabled>Selecciona un nivel</option>
            <option value="baja" {{ old('nivel_cortina', $cortina->nivel_cortina) == 'baja' ? 'selected' : '' }}>Baja</option>
            <option value="media" {{ old('nivel_cortina', $cortina->nivel_cortina) == 'media' ? 'selected' : '' }}>Media</option>
            <option value="alta" {{ old('nivel_cortina', $cortina->nivel_cortina) == 'alta' ? 'selected' : '' }}>Alta</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
