@extends('layouts.app')

@section('title', 'Agregar Aire Acondicionado')

@section('content')
<div class="container p-4 bg-white rounded shadow-sm">
    <h1 class="mb-4">Agregar Nuevo Aire Acondicionado</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('aireacondicionados.store') }}" method="POST" class="mb-4">
        @csrf

        <div class="mb-3">
            <label for="aula_id" class="form-label">Aula:</label>
            <select name="aula_id" id="aula_id" class="form-select" required>
                <option value="">Selecciona un aula</option>
                @foreach ($aulas as $aula)
                    <option value="{{ $aula->id }}" {{ old('aula_id') == $aula->id ? 'selected' : '' }}>
                        {{ $aula->nombre ?? 'Aula ' . $aula->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="marca" class="form-label">Marca:</label>
                <input type="text" name="marca" id="marca" class="form-control" value="{{ old('marca') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="modelo" class="form-label">Modelo:</label>
                <input type="text" name="modelo" id="modelo" class="form-control" value="{{ old('modelo') }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="estado" class="form-label">Estado:</label>
                <select name="estado" id="estado" class="form-select" required>
                    <option value="Encendido" {{ old('estado') == 'Encendido' ? 'selected' : '' }}>Encendido</option>
                    <option value="Apagado" {{ old('estado') == 'Apagado' ? 'selected' : '' }}>Apagado</option>
                    <option value="En mantenimiento" {{ old('estado') == 'En mantenimiento' ? 'selected' : '' }}>En mantenimiento</option>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="mantenimiento" class="form-label">Mantenimiento:</label>
                <select name="mantenimiento" id="mantenimiento" class="form-select" required>
                    <option value="Al día" {{ old('mantenimiento') == 'Al día' ? 'selected' : '' }}>Al día</option>
                    <option value="Pendiente" {{ old('mantenimiento') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="En proceso" {{ old('mantenimiento') == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                </select>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary-action me-2">
                <i class="fa-solid fa-floppy-disk"></i> Guardar
            </button>
            <a href="{{ route('aireacondicionados.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
