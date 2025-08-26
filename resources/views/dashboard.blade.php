@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
    <h1>Bienvenido, {{ auth()->user()->name }}</h1>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="dropdown-item">Cerrar sesión</button>
</form>

</div>
@endsection
