@extends('layouts.app')

@section('title', 'Editar Foco')

@section('content')
<div class="container">
    <h1>Editar Foco</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay problemas con la información ingresada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('focos.update', $foco->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="codigo" class="form-label">Código:</label>
            <input type="text" name="codigo" id="codigo" class="form-control" value="{{ old('codigo', $foco->codigo) }}" required>
        </div>

        <div class="mb-3">
            <label for="intensidad" class="form-label">Intensidad:</label>
            <input type="number" name="intensidad" id="intensidad" class="form-control" min="0" max="100" value="{{ old('intensidad', $foco->intensidad) }}" required>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo:</label>
            <input type="text" name="tipo" id="tipo" class="form-control" value="{{ old('tipo', $foco->tipo) }}" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado:</label>
            <select name="estado" id="estado" class="form-control" required>
                @php
                    $estados = ['apagado', 'encendido', 'en reparación', 'fuera de servicio'];
                @endphp
                @foreach($estados as $estado)
                    <option value="{{ $estado }}" {{ old('estado', $foco->estado) == $estado ? 'selected' : '' }}>
                        {{ ucfirst($estado) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="aula_id" class="form-label">Aula:</label>
            <select name="aula_id" id="aula_id" class="form-control" required>
                <option value="">-- Selecciona un aula --</option>
                @foreach($aulas as $aula)
                    <option value="{{ $aula->id }}" {{ old('aula_id', $foco->aula_id) == $aula->id ? 'selected' : '' }}>
                        {{ $aula->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('focos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
