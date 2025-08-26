@extends('layouts.app')

<h1>Disponibilidad - Show View</h1>

<p><strong>Aula:</strong> {{ $disponibilidad->aula->nombre ?? 'Sin aula' }}</p>
<p><strong>Estado:</strong> {{ $disponibilidad->estado }}</p>
<p><strong>Hora:</strong> {{ $disponibilidad->hora }}</p>
<p><strong>Fecha:</strong> {{ $disponibilidad->fecha }}</p>

<a href="{{ route('disponibilidades.edit', $disponibilidad->id) }}">Editar</a>

<form action="{{ route('aireacondicionados.update', $aireacondicionado->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('¿Estás segura de eliminar esta disponibilidad?')">Eliminar</button>
</form>
