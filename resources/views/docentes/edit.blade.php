@extends('layouts.app')

@section('title', 'Editar Docente')

@section('content')
<h1>Editar docente</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Errores en el formulario:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('docentes.update', $docente) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre *</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $docente->nombre) }}" required>
    </div>
    <div class="mb-3">
        <label for="especialidad" class="form-label">Especialidad</label>
        <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{ old('especialidad', $docente->especialidad) }}">
    </div>
    <div class="mb-3">
        <label for="correo" class="form-label">Correo electrónico *</label>
        <input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo', $docente->correo) }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
