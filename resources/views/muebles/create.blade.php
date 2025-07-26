@extends('layouts.app')

@section('title', 'Crear Mueble')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Crear Mueble</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('muebles.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="aula_id" class="form-label">Aula</label>
                <select name="aula_id" class="form-select" required>
                    @foreach(App\Models\Aula::all() as $aula)
                        <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select name="tipo" class="form-select" required>
                    <option value="Proyector">Proyector</option>
                    <option value="Silla">Silla</option>
                    <option value="Mueble">Mueble</option>
                    <option value="Pantalla">Pantalla</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" value="1" min="1" required>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control">
            </div>

            <div class="mb-3">
                <label for="numero_inventario" class="form-label">Número de Inventario</label>
                <input type="text" name="numero_inventario" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</div>
@endsection
