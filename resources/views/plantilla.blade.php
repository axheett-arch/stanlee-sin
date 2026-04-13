<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stanley x Axheet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body style="background-color: #121212; color: white;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-magenta">
        <div class="container">
            <a class="navbar-brand Hansip" href="/" style="color: #ff00ff; font-size: 2rem;">STANLEY</a>
            <div class="navbar-nav">
                <a class="nav-link" href="/">Inicio</a>
                <a class="nav-link" href="/catalogo">Catálogo</a>
                <a class="nav-link" href="/contacto">Contacto</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('contenido')
    </div>

    <footer class="text-center py-4 mt-5 border-top border-secondary text-secondary">
        <p>&copy; 2026 Stanley Corrientes - Axel Gomez</p>
    </footer>

</body>
</html>

