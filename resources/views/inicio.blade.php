<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aula Inteligente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f7fa;
            color: #333;
        }

        header {
            background-color: #4a90e2;
            color: white;
            padding: 2rem 1rem;
            text-align: center;
        }

        h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        p {
            margin: 0.5rem 0 2rem 0;
            font-size: 1.1rem;
        }

        main {
            max-width: 900px;
            margin: auto;
            padding: 2rem;
        }

        ul {
            list-style: none;
            padding: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        li a {
            display: block;
            padding: 1rem;
            background-color: white;
            border-radius: 12px;
            text-align: center;
            text-decoration: none;
            color: #4a90e2;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        li a:hover {
            background-color: #4a90e2;
            color: white;
            transform: translateY(-3px);
        }

        footer {
            text-align: center;
            padding: 1rem;
            background-color: #eee;
            margin-top: 2rem;
        }
    </style>
</head>
<body>

    <header>
        <h1>📚 Aula Inteligente</h1>
        <p>Gestioná todos los recursos del aula desde un solo lugar</p>
    </header>

    <main>
    <ul>

    <li><a href="{{ route('aulas.index') }}">🏫 Aulas</a></li>
    <li><a href="{{ route('docentes.index') }}">👩‍🏫 Docentes</a></li>
    <li><a href="{{ route('materias.index') }}">📘 Materias</a></li>
    <li><a href="{{ route('reservas.index') }}">📅 Reservas</a></li>
    <li><a href="{{ route('cortinas.index') }}">🪟 Cortinas</a></li>
    <li><a href="{{ route('focos.index') }}">💡 Focos</a></li>
    <li><a href="{{ route('aireacondicionados.index') }}">❄️ Aires Acondicionados</a></li>
    <li><a href="{{ route('muebles.index') }}">🪑 Muebles</a></li>
    <li><a href="{{ route('disponibilidades.index') }}">✅ Disponibilidad</a></li>
    <li><a href="{{ route('horarios.index') }}">⏰ Horarios</a></li>

    </ul>
    
    </main>

    <footer>
        &copy; {{ date('Y') }} Aula Inteligente - Proyecto Laravel
    </footer>

</body>
</html>
