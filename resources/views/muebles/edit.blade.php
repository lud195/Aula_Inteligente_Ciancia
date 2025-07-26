@extends('layouts.app')

@section('title', 'Editar Mueble')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Editar Mueble</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('muebles.update', $mueble) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="aula_id" class="form-label">Aula</label>
                <select name="aula_id" class="form-select" required>
                    @foreach(App\Models\Aula::all() as $aula)
                        <option value="{{ $aula->id }}" {{ $mueble->aula_id == $aula->id ? 'selected' : '' }}>
                            {{ $aula->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select name="tipo" class="form-select" required>
                    <option value="Proyector" {{ $mueble->tipo == 'Proyector' ? 'selected' : '' }}>Proyector</option>
                    <option value="Silla" {{ $mueble->tipo == 'Silla' ? 'selected' : '' }}>Silla</option>
                    <option value="Mueble" {{ $mueble->tipo == 'Mueble' ? 'selected' : '' }}>Mueble</option>
                    <option value="Pantalla" {{ $mueble->tipo == 'Pantalla' ? 'selected' : '' }}>Pantalla</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" value="{{ $mueble->cantidad }}" min="1" required>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" name="estado" class="form-control" value="{{ $mueble->estado }}">
            </div>

            <div class="mb-3">
                <label for="numero_inventario" class="form-label">Número de Inventario</label>
                <input type="text" name="numero_inventario" class="form-control" value="{{ $mueble->numero_inventario }}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection

