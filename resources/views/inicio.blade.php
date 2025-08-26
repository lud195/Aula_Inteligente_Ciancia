<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aula Inteligente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Iconos FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
:root {
    --rosa-principal: #FF8DA1;
    --rosa-claro: #FFD6DC;
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

header {
    background-color: var(--rosa-principal);
    color: white;
    padding: 2rem 1rem;
    text-align: center;
    position: relative;
}



h1 {
    margin: 0;
    font-size: 2.5rem;
}

p {
    margin: 0.5rem 0 2rem 0;
    font-size: 1.1rem;
}

.user-menu {
    position: absolute;
    top: 1.5rem;
    right: 1rem;
    cursor: pointer;
    user-select: none;
}

.dropdown {
    display: none;
    position: absolute;
    right: 0;
    background-color: white;
    color: var(--texto-principal);
    min-width: 180px;
    border-radius: 6px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    margin-top: 0.5rem;
    z-index: 1000;
    overflow: hidden;
}

.dropdown a, .dropdown form button {
    display: block;
    padding: 0.5rem 1rem;
    text-decoration: none;
    color: var(--texto-principal);
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    font-size: 1rem;
}

.dropdown a:hover, .dropdown form button:hover {
    background-color: var(--rosa-principal);
    color: white;
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
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* mantiene responsivo */
    gap: 1rem;
}

li a {
    display: flex;
    flex-direction: column; /* icono arriba, texto abajo */
    justify-content: center;
    align-items: center;
    width: 200px;   /* ancho fijo */
    height: 150px;  /* alto fijo */
    margin: auto;   /* centra en su celda del grid */
    background-color: white;
    border-radius: 12px;
    text-decoration: none;
    color: var(--rosa-principal);
    font-weight: bold;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    text-align: center;
}

li a i {
    font-size: 2rem; /* icono más grande */
    margin-bottom: 0.5rem;
}

li a:hover {
    background-color: var(--rosa-principal);
    color: white;
    transform: translateY(-3px);
}


footer {
    text-align: center;
    padding: 1rem;
    background-color: var(--gris-claro); /* fondo más claro */
    color: var(--rosa-principal);        /* texto rosa para que resalte */
    font-size: 1rem;
    font-weight: bold;
    letter-spacing: 0.5px;

}


</style>

</head>
<body>

<header>
    <div class="header-box">
        <h1>
            <i class="fa-solid fa-graduation-cap" style="margin-right:0.5rem;"></i>
            Aula Inteligente
        </h1>
        <p>Gestioná todos los recursos del aula desde un solo lugar</p>
    </div>

    @auth
    <div class="user-menu" id="userMenu">
        <i id="userIcon" class="fa-solid fa-user-circle" style="font-size:40px; color:white;"></i>

        <div class="dropdown" id="dropdownMenu">
            <div style="padding: 0.5rem 1rem; border-bottom: 1px solid #ddd;">
                <strong>{{ auth()->user()->name }}</strong><br>
                <small>{{ auth()->user()->email }}</small>
            </div>
            <a href="{{ route('perfil') }}">Mi perfil</a>

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="dropdown-item">Cerrar sesión</button>
            </form>
        </div>
    </div>
    @endauth
</header>



<main>
    <ul>
        <li>
            <a href="{{ route('aulas.index') }}">
                <i class="fa-solid fa-school"></i> Aulas
            </a>
        </li>
        <li>
            <a href="{{ route('docentes.index') }}">
                <i class="fa-solid fa-chalkboard-user"></i> Docentes
            </a>
        </li>
        <li>
            <a href="{{ route('materias.index') }}">
                <i class="fa-solid fa-book"></i> Materias
            </a>
        </li>
        <li>
            <a href="{{ route('reservas.index') }}">
                <i class="fa-solid fa-calendar-check"></i> Reservas
            </a>
        </li>
        <li>
            <a href="{{ route('cortinas.index') }}">
                <i class="fa-solid fa-window-maximize"></i> Cortinas
            </a>
        </li>
        <li>
            <a href="{{ route('focos.index') }}">
                <i class="fa-solid fa-lightbulb"></i> Focos
            </a>
        </li>
        <li>
            <a href="{{ route('aireacondicionados.index') }}">
                <i class="fa-solid fa-snowflake"></i> Aires Acondicionados
            </a>
        </li>
        <li>
            <a href="{{ route('muebles.index') }}">
                <i class="fa-solid fa-chair"></i> Muebles
            </a>
        </li>
        <li>
            <a href="{{ route('disponibilidades.index') }}">
                <i class="fa-solid fa-circle-check"></i> Disponibilidad
            </a>
        </li>
        <li>
            <a href="{{ route('horarios.index') }}">
                <i class="fa-solid fa-clock"></i> Horarios
            </a>
        </li>
    </ul>
</main>


<footer>
    <p>
        &copy; 2025 Ludmila Ciancia Arias. <span class="highlight">Todos los derechos reservados.</span>
    </p>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const userIcon = document.getElementById('userIcon');
        const dropdownMenu = document.getElementById('dropdownMenu');

        userIcon.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', function(e) {
            if (!dropdownMenu.contains(e.target)) {
                dropdownMenu.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>
