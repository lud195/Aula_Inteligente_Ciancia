<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>@yield('title', 'Aula Inteligente')</title>

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    :root {
        --rosa-principal: #FF8DA1;
        --rosa-claro: #FFD6DC;
        --rosa-medio: #FF5C85;
        --rosa-intenso: #FF1E44;
        --gris-claro: #F8F9FA;
        --gris-medio: #CED4DA;
        --texto-principal: #343A40;
    }

    body {
        font-family: 'Segoe UI', sans-serif;
        margin: 0;
        padding: 0;
        background: var(--gris-claro);
        color: var(--texto-principal);
    }

    main.container {
        max-width: 1200px;
        margin: auto;
        padding: 2rem 1rem;
    }

    /* Tarjetas profesionales */
    .card {
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    }

    /* Alerts */
    .alert {
        border-radius: 12px;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }

    /* Quitar borde azul de todos los botones */
    .btn,
    a.btn,
    button.btn {
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
    }

    /* Para focus/active, mantener resplandor rosa opcional */
    .btn:focus,
    .btn:active,
    .btn:focus-visible,
    a.btn:focus,
    a.btn:active,
    a.btn:focus-visible,
    button.btn:focus,
    button.btn:active,
    button.btn:focus-visible {
        outline: none !important;
        box-shadow: 0 0 0 0.2rem rgba(255,141,161,0.5) !important; /* resplandor rosa */
        border: none !important;
    }

    /* Botones específicos */
    .btn-view {
        background-color: var(--rosa-claro);
        color: white;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-view:hover {
        background-color: var(--rosa-principal);
        transform: translateY(-2px);
        color: white;
    }

    .btn-edit {
        background-color: var(--rosa-medio);
        color: white;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-edit:hover {
        background-color: var(--rosa-principal);
        transform: translateY(-2px);
        color: white;
    }

    .btn-delete {
        background-color: var(--rosa-intenso);
        color: white;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-delete:hover {
        background-color: #FF0055;
        transform: translateY(-2px);
        color: white;
    }

    /* Botones de acción general (success / primary) */
    .btn-success, .btn-primary {
        background-color: var(--rosa-principal);
        color: white;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-success:hover, .btn-primary:hover {
        background-color: var(--rosa-medio);
        color: white;
        transform: translateY(-2px);
    }

    /* Botones secundarios (cancelar) */
    .btn-secondary {
        background-color: var(--gris-medio);
        color: var(--texto-principal);
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-secondary:hover {
        background-color: var(--gris-claro);
        color: var(--rosa-principal);
        transform: translateY(-2px);
    }

    /* Botón volver al inicio */
    .home-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        justify-content: center;
        margin-top: 2rem;
        padding: 0.6rem 1.2rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 8px;
        background-color: var(--rosa-principal);
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }
    .home-button:hover {
        background-color: var(--rosa-claro);
        color: var(--texto-principal);
        transform: translateY(-2px);
    }

    .btn-primary-action {
        background-color: var(--rosa-principal);
        color: white;
        border-radius: 8px;
        font-weight: 600;
        padding: 0.4rem 0.8rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
    }

    .btn-primary-action:hover {
        background-color: var(--rosa-medio);
        color: white;
        transform: translateY(-2px);
    }

</style>

</head>
<body>
    <main class="container py-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')

        @if(!isset($noVolverInicio) || $noVolverInicio === false)
    <div class="text-center">
        <a href="{{ route('home') }}" class="home-button">
            <i class="fa-solid fa-house"></i> Volver al inicio
        </a>
    </div>
@endif


    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

