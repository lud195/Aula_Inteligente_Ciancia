@extends('layouts.app')

@section('title', 'Crear Cortina')

@section('content')
<h1>Crear Cortina</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('cortinas.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="aula_id" class="form-label">Ubicación (Aula)</label>
        <select name="aula_id" id="aula_id" class="form-select" required>
            <option value="" disabled selected>Selecciona un aula</option>
            @foreach($aulas as $aula)
                <option value="{{ $aula->id }}" {{ old('aula_id') == $aula->id ? 'selected' : '' }}>
                    {{ $aula->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select name="estado" id="estado" class="form-select" required>
            <option value="" disabled selected>Selecciona un estado</option>
            <option value="roto" {{ old('estado') == 'roto' ? 'selected' : '' }}>Roto</option>
            <option value="bien" {{ old('estado') == 'bien' ? 'selected' : '' }}>Bien</option>
            <option value="nuevo" {{ old('estado') == 'nuevo' ? 'selected' : '' }}>Nuevo</option>
            <option value="en reparacion" {{ old('estado') == 'en reparacion' ? 'selected' : '' }}>En reparación</option>
            <option value="no se" {{ old('estado') == 'no se' ? 'selected' : '' }}>No sé</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection

