@extends('layouts.app')

@section('title', 'Editar Reserva')

@section('content')
    <h1>Editar Reserva</h1>

    <form action="{{ route('reservas.update', $reserva) }}" method="POST">
        @csrf @method('PUT')

        <!-- igual que create pero con value="{{ old('campo', $reserva->campo) }}" -->
        <!-- ejemplo: -->
        <input type="date" name="fecha" class="form-control" value="{{ old('fecha', $reserva->fecha) }}" required>
        <!-- lo mismo con select usando selected -->
        <!-- repetís la estructura del formulario pero con valores de $reserva -->
        <!-- ... -->

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
