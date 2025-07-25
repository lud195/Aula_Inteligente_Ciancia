<!-- resources/views/aulas/index.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Aulas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4">Listado de Aulas</h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('aulas.create') }}" class="btn btn-success">Agregar Aula</a>
    </div>

    @if($aulas->count())
        <div class="row">
            @foreach($aulas as $aula)
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">{{ $aula->nombre }}</h5>
                            <p class="card-text">
                                <strong>Ubicación:</strong> {{ $aula->ubicacion ?? 'Sin ubicación' }}<br>
                                <strong>Capacidad:</strong> {{ $aula->capacidad ?? 'No definida' }}
                            </p>
                            <a href="{{ route('aulas.show', $aula) }}" class="btn btn-primary btn-sm">Ver</a>
                            <a href="{{ route('aulas.edit', $aula) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('aulas.destroy', $aula) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar aula?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            @endforeach
        </div>

        <!-- Aquí paginación Bootstrap -->
        <div class="d-flex justify-content-center">
            {{ $aulas->links('pagination::bootstrap-5') }}
        </div>
    @else
        <p class="text-center">No hay aulas registradas aún.</p>
    @endif
    <a href="{{ route('home') }}" style="
    display: inline-block;
    margin: 1rem 0;
    padding: 0.5rem 1rem;
    background-color: #4a90e2;
    color: white;
    border-radius: 8px;
    text-decoration: none;
">
    ⬅️ Volver al inicio
</a>

</div>

</body>
</html>

