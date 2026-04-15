<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StanLee Sin | Axel & Tiago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}?v=1.1">
</head>

<body style="background-color: #121212; color: white;">

    <nav class="navbar navbar-dark bg-black border-bottom border-magenta py-3">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center">
                <button class="btn text-white p-0 border-0 hansip-font me-3" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#menuLateral" style="font-size: 1.2rem; letter-spacing: 2px;">
                    MENU
                </button>

                <a class="navbar-brand hansip-font" href="/" style="color: #c80d55; font-size: 2.2rem;">
                    StanLee Sin
                </a>
            </div>

            <div class="d-flex align-items-center">
                <a href="/catalogo" class="nav-link hansip-font d-none d-md-block px-3"
                    style="font-size: 0.9rem;">CATALOGO</a>
                <a href="/consultas" class="btn btn-outline-light btn-sm hansip-font ms-2"
                    style="border-color: #c80d55; color: #c80d55; font-size: 0.8rem;">
                    CONSULTAS
                </a>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start bg-black text-white border-end border-magenta" tabindex="-1" id="menuLateral"
        style="width: 300px;">

        <div class="offcanvas-header border-bottom border-secondary">
            <h5 class="offcanvas-title hansip-font" style="color: #c80d55;">StanLee Sin</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">
            <ul class="navbar-nav">
                <li class="nav-item mb-2"><a class="nav-link hansip-font fs-5" href="/">INICIO</a></li>
                <li class="nav-item mb-2"><a class="nav-link hansip-font fs-5" href="/nosotros">QUIÉNES SOMOS</a></li>
                <li class="nav-item mb-2"><a class="nav-link hansip-font fs-5"
                        href="/comercializacion">COMERCIALIZACIÓN</a></li>
                <li class="nav-item mb-2"><a class="nav-link hansip-font fs-5" href="/contacto">CONTACTO</a></li>
                <li class="nav-item mb-2"><a class="nav-link hansip-font fs-5" href="/terminos">TÉRMINOS Y USOS</a></li>
                <li class="nav-item mb-2"><a class="nav-link hansip-font fs-5" href="/catalogo">CATALOGO</a></li>
                <li class="nav-item mb-2"><a class="nav-link hansip-font fs-5" href="/consultas">CONSULTAS</a></li>
            </ul>

            <div class="mt-5 pt-4 border-top border-secondary">
                <p class="small text-secondary mb-0">Staff: Axel & Tiago Devs</p>
                <p class="small text-secondary">Corrientes, Argentina</p>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        @yield('contenido')
    </div>

    <footer class="text-center py-4 mt-5 border-top border-secondary text-secondary">
        <p>&copy; 2026 StanLee Sin - Axel & Tiago </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
