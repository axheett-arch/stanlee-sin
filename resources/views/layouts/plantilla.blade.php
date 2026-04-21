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

    <nav class="navbar navbar-dark bg-black border-bottom border-magenta py-3 sticky-top">
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
                <a href="/register" class="btn-outline-light btn-sm hansip-font ms-2"
                    style="background-color: #c80d55; border-color: #c80d55; color: white; font-size: 0.8rem; padding: 7px 20px; text-decoration: none; transform: skewX(-10deg);">
                    UNIRSE AL CREW
                </a>

                <a href="/login" class="btn btn-outline-light btn-sm hansip-font ms-2"
                    style="border-color: white; color: white; font-size: 0.8rem; padding: 7px 20px; text-decoration: none;">
                    INICIAR SESIÓN
                </a>
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
                <li class="nav-item mb-2">
                    <a class="nav-link hansip-font fs-5 d-flex align-items-center" href="/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="me-2" style="position: relative; top: -3px;">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                        <span>INICIO</span>
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a class="nav-link hansip-font fs-5 d-flex align-items-center" href="/catalogo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="me-2" style="position: relative; top: -3px;">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304" />
                            <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                        </svg>
                        <span>CATALOGO</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link hansip-font fs-5 d-flex align-items-center" href="/nosotros">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="me-2" style="position: relative; top: -3px;">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 7a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                        </svg>
                        <span>QUIÉNES SOMOS</span>
                    </a>
                </li>

                <li class="my-3 border-bottom border-secondary opacity-25"></li>

                <li class="nav-item mb-2">
                    <a class="nav-link hansip-font fs-6 text-secondary d-flex align-items-center"
                        href="/comercializacion">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="me-2" style="position: relative; top: -3px;">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M2 3h1a2 2 0 0 1 2 2v10a2 2 0 0 0 2 2h15" />
                            <path d="M9 9a3 3 0 0 1 3 -3h4a3 3 0 0 1 3 3v2a3 3 0 0 1 -3 3h-4a3 3 0 0 1 -3 -3l0 -2" />
                            <path d="M7 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M16 19a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        </svg>
                        <span>COMERCIALIZACIÓN</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link hansip-font fs-6 text-secondary d-flex align-items-center" href="/contacto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="me-2" style="position: relative; top: -3px;">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10" />
                            <path d="M3 7l9 6l9 -6" />
                        </svg>
                        <span>CONTACTO</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link hansip-font fs-6 text-secondary d-flex align-items-center" href="/consultas">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="me-2" style="position: relative; top: -3px;">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12.802 2.165l5.575 2.389c.48 .206 .863 .589 1.07 1.07l2.388 5.574c.22 .512 .22 1.092 0 1.604l-2.389 5.575c-.206 .48 -.589 .863 -1.07 1.07l-5.574 2.388c-.512 .22 -1.092 .22 -1.604 0l-5.575 -2.389a2.036 2.036 0 0 1 -1.07 -1.07l-2.388 -5.574a2.036 2.036 0 0 1 0 -1.604l2.389 -5.575c.206 -.48 .589 -.863 1.07 -1.07l5.574 -2.388a2.036 2.036 0 0 1 1.604 0" />
                            <path d="M12 16v.01" />
                            <path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" />
                        </svg>
                        <span>FAQ / CONSULTAS</span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link hansip-font fs-6 text-secondary d-flex align-items-center" href="/terminos">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="me-2" style="position: relative; top: -3px;">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11" />
                            <path d="M9 7l4 0" />
                            <path d="M9 11l4 0" />
                        </svg>
                        <span>TÉRMINOS Y USOS</span>
                    </a>
                </li>
            </ul>

        </div>
        <div class="mt-5 pt-4 border-top border-secondary">
            <p class="small text-magenta hansip-font mb-1" style="font-size: 0.6rem;">UNIT: AXEL & TIAGO DEVS</p>
            <p class="small text-secondary mb-0">Corrientes, Argentina</p>
            <p class="small text-secondary opacity-50">PROYECTO TALLER I // 2026</p>
        </div>
    </div>
    </div>

    <div class="container mt-5">
        @yield('contenido')
    </div>
    <div class="container mt-5 pt-5 mb-4">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <h4 class="hansip-font mb-4" style="font-size: 1.1rem; letter-spacing: 1px; color: white;">
                    ¿Quieres enterarte de todas las novedades? <br>
                    <span class="text-magenta">Sigue a la gang</span> en todas sus redes sociales
                </h4>

                <div class="d-flex justify-content-center gap-4 mt-2">
                    <a href="#" class="nav-link p-0 social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 4l11.733 16h4.267l-11.733 -16l-4.267 0" />
                            <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                        </svg>
                    </a>

                    <a href="#" class="nav-link p-0 social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4l0 -8" />
                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                            <path d="M16.5 7.5v.01" />
                        </svg>
                    </a>

                    <a href="#" class="nav-link p-0 social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center py-4 mt-5 border-top border-secondary text-secondary">
        <p class="small mb-0">&copy; 2026 <span class="text-magenta hansip-font">StanLee Sin</span> - Axel Gomez &
            Tiago
            Tomasella</p>
        <p class="small opacity-50">Resistencia Legendaria en cada pixel.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
