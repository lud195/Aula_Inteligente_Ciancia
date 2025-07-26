@extends('layouts.app')

@section('title', 'Detalle Cortina')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Detalle de Cortina</h3>
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $cortina->id }}</p>
        <p><strong>Estado:</strong> {{ $cortina->estado }}</p>
        <p><strong>Ubicación:</strong> {{ $cortina->ubicacion }}</p>

        <a href="{{ route('cortinas.index') }}" class="btn btn-secondary mt-3">← Volver a la lista</a>
    </div>
</div>
@endsection
