<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas | StanLee Sin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}?v=1.1">

    <style>
        /* Solo agregamos lo específico de Spotify, el resto lo trae tu CSS */
        .hero-consultas {
            padding: 100px 20px 40px;
            text-align: center;
        }

        .titulo-principal {
            font-family: 'HansipCustom', sans-serif !important;
            font-size: 3.5rem;
            color: white;
            margin-bottom: 20px;
        }

        .search-container {
            max-width: 700px;
            margin: 30px auto;
        }

        .search-input {
            width: 100%;
            padding: 15px 25px;
            border-radius: 8px;
            border: none;
            font-size: 1.1rem;
        }

        .card-consulta {
            background-color: #181818;
            border-radius: 12px;
            padding: 25px;
            height: 160px;
            display: flex;
            align-items: flex-end;
            transition: 0.3s;
            text-decoration: none !important;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .card-consulta:hover {
            border-color: #c80d55;
            transform: translateY(-5px);
        }

        .card-consulta h3 {
            font-family: 'HansipCustom', sans-serif !important;
            font-size: 1.3rem;
            color: white;
            margin: 0;
        }

        .bg-magenta-custom {
            background-color: #c80d55 !important;
        }
    </style>
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

    <div class="hero-consultas">
        <h1 class="titulo-principal">¿En qué podemos ayudarte?</h1>
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Buscá respuestas sobre envíos, garantías...">
        </div>
    </div>

    <div class="container mb-5">
        <h2 class="hansip-font mb-4" style="color: #c80d55; font-size: 1.5rem;">Preguntas Frecuentes</h2>
        <div class="row g-4">
            <div class="col-6 col-md-4"><a href="#" class="card-consulta bg-magenta-custom">
                    <h3>Envíos</h3>
                </a></div>
            <div class="col-6 col-md-4"><a href="#" class="card-consulta">
                    <h3>Garantías</h3>
                </a></div>
            <div class="col-6 col-md-4"><a href="#" class="card-consulta">
                    <h3>Pagos</h3>
                </a></div>
        </div>

        <div class="text-center mt-5">
            <a href="/" class="hansip-font text-white text-decoration-none px-5 py-3"
                style="background-color: #c80d55; clip-path: polygon(10% 0%, 100% 0%, 90% 100%, 0% 100%); display: inline-block;">
                VOLVER AL INICIO
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
