<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StanLee Sin | Axel & Tiago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}?v=1.2">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
</head>

<body style="background-color: #121212; color: white;">

    {{-- NAVBAR PRINCIPAL --}}
    <nav class="navbar navbar-dark bg-black border-bottom border-magenta py-3 sticky-top">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center">
                {{-- Botón menú lateral izquierdo (hamburguesa) si lo tienen asociado --}}
                <button class="navbar-toggler border-0 p-0 me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand hansip-font" href="/" style="color: #c80d55; font-size: 2.2rem;">
                    StanLee Sin
                </a>
            </div>

            <div class="d-flex align-items-center gap-2">

                {{-- MENÚ PARA VISITANTES (NO LOGUEADOS) --}}
                @guest
                    <a href="{{ route('register') }}"
                       class="btn btn-sm hansip-font text-white px-3 py-2 text-decoration-none"
                       style="background-color: #c80d55; border: none; font-size: 0.9rem; letter-spacing: 1px; transform: skewX(-10deg); display: inline-block; transition: 0.3s;">
                       <span style="transform: skewX(10deg); display: inline-block;">UNIRSE A LA CREW</span>
                    </a>

                    <a href="{{ route('login') }}"
                       class="btn btn-sm btn-outline-light hansip-font px-3 py-2 text-decoration-none"
                       style="border: 2px solid white; background: transparent; color: white; font-size: 0.9rem; letter-spacing: 1px; transform: skewX(-10deg); display: inline-block; transition: 0.3s;">
                       <span style="transform: skewX(10deg); display: inline-block;">INICIAR SESIÓN</span>
                    </a>
                @endguest

                {{-- MENÚ PARA USUARIOS REGISTRADOS --}}
                @auth
                    @php
                        // Contamos de forma dinámica cuántos suministros hay guardados en la sesión
                        $cart = session()->get('cart', []);
                        $totalItems = 0;
                        foreach($cart as $item) {
                            $totalItems += $item['cantidad'];
                        }
                    @endphp

                    {{-- ACCESO AL CARRITO / INVENTARIO TÁCTICO CON DESPLIEGUE LATERAL DERECHO --}}
                    <button type="button" class="btn btn-sm btn-outline-light hansip-font px-3 py-2 text-decoration-none me-2 position-relative"
                        data-bs-toggle="offcanvas" data-bs-target="#inventarioLateral" aria-controls="inventarioLateral"
                        style="border: 2px solid #c80d55; background: transparent; color: white; font-size: 0.9rem; letter-spacing: 1px; transform: skewX(-10deg); display: inline-block; transition: 0.3s; cursor: pointer;">
                        <span style="transform: skewX(10deg); display: inline-block;" class="d-flex align-items-center gap-1">
                            <i class="ti ti-shopping-bag" style="font-size: 1.1rem; position: relative; top: -1px;"></i> INVENTARIO
                        </span>

                        {{-- Contador de productos flotante sobre el botón --}}
                        @if($totalItems > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-0 hansip-font border border-black"
                                style="font-size: 0.65rem; padding: 3px 6px; background-color: #c80d55; color: black; transform: skewX(10deg) translate(-5px, -5px);">
                                {{ $totalItems }}
                            </span>
                        @endif
                    </button>

                    <span class="text-white hansip-font me-3" style="font-size: 0.9rem; letter-spacing: 1px;">
                        ¡HOLA, <span class="text-magenta" style="color: #c80d55;">{{ strtoupper(auth()->user()->name) }}</span>!
                    </span>

                    <form action="{{ route('logout') }}" method="POST" class="m-0 p-0" style="display: inline;">
                        @csrf
                        <button type="submit"
                                class="btn btn-sm btn-outline-light hansip-font px-3 py-2 text-decoration-none"
                                style="border: 2px solid #c80d55; background: transparent; color: #c80d55; font-size: 0.9rem; letter-spacing: 1px; transform: skewX(-10deg); display: inline-block; transition: 0.3s; cursor: pointer;">
                            <span style="transform: skewX(10deg); display: inline-block; color: #c80d55;">CERRAR SESIÓN</span>
                        </button>
                    </form>
                @endauth

            </div>
        </div>
    </nav>

    {{-- PANEL LATERAL IZQUIERDO (MENÚ GENERAL DE NAVEGACIÓN) --}}
    <div class="offcanvas offcanvas-start bg-black text-white border-end border-magenta" tabindex="-1" id="menuLateral" style="width: 300px;">
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
                            <path d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304" />
                            <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                        </svg>
                        <span>CATALOGO</span>
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a class="nav-link hansip-font fs-5 d-flex align-items-center {{ Auth::check() ? '' : 'disabled opacity-50' }}" href="{{ route('compras.historial') }}">
                        <i class="ti ti-history me-2" style="font-size: 1.6rem;"></i>
                        <span>MIS COMPRAS</span>
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
                    <a class="nav-link hansip-font fs-6 text-secondary d-flex align-items-center" href="/comercializacion">
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
                            <path d="M12.802 2.165l5.575 2.389c.48 .206 .863 .589 1.07 1.07l2.388 5.574c.22 .512 .22 1.092 0 1.604l-2.389 5.575c-.206 .48 -.589 .863 -1.07 1.07l-5.574 2.388c-.512 .22 -1.092 .22 -1.604 0l-5.575 -2.389a2.036 2.036 0 0 1 -1.07 -1.07l-2.388 -5.574a2.036 2.036 0 0 1 0 -1.604l2.389 -5.575c.206 -.48 .589 -.863 1.07 -1.07l5.574 -2.388a2.036 2.036 0 0 1 1.604 0" />
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
                            <path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11" />
                            <path d="M9 7l4 0" />
                            <path d="M9 11l4 0" />
                        </svg>
                        <span>TÉRMINOS Y USOS</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="p-3 border-top border-secondary">
            <p class="small text-magenta hansip-font mb-1" style="font-size: 0.6rem;">UNIT: AXEL & TIAGO DEVS</p>
            <p class="small text-secondary mb-0">Corrientes, Argentina</p>
            <p class="small text-secondary opacity-50">PROYECTO TALLER I // 2026</p>
        </div>
    </div>

    {{-- CONTENEDOR PRINCIPAL DE CONTENIDO --}}
    <div class="container mt-5">
        @yield('contenido')
    </div>

    {{-- SECCIÓN DE REDES SOCIALES --}}
    <div class="container mt-5 pt-5 mb-4">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <h4 class="hansip-font mb-4" style="font-size: 1.1rem; letter-spacing: 1px; color: white;">
                    ¿Quieres enterarte de todas las novedades? <br>
                    <span class="text-magenta">Sigue al team</span> en todas sus redes sociales
                </h4>

                <div class="d-flex justify-content-center gap-4 mt-2">
                    <a href="https://x.com/KjdkeJ" target="_blank" class="nav-link p-0 social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 4l11.733 16h4.267l-11.733 -16l-4.267 0" />
                            <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                        </svg>
                    </a>

                    <a href="https://www.instagram.com/tiagotomasella_" target="_blank" class="nav-link p-0 social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4l0 -8" />
                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                            <path d="M16.5 7.5v.01" />
                        </svg>
                    </a>

                    <a href="https://www.tiktok.com/@kjdkejdkdid?lang=es" target="_blank" class="nav-link p-0 social-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-tiktok">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M21 7.917v4.034a9.948 9.948 0 0 1 -5 -1.951v4.5a6.5 6.5 0 1 1 -8 -6.326v4.326a2.5 2.5 0 1 0 4 2v-11.5h4.083a6.005 6.005 0 0 0 4.917 4.917" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- FOOTER GENERADO --}}
    <footer class="text-center py-4 mt-5 border-top border-secondary text-secondary" style="background: rgba(0,0,0,0.8);">
        <p class="small mb-0">&copy; 2026 <span class="text-magenta hansip-font">StanLee Sin</span> - Axel Gomez & Tiago Tomasella</p>
        <p class="small opacity-50">Resistencia Legendaria en cada pixel.</p>
    </footer>

    {{-- BOTÓN DE SCROLL HACIA ARRIBA --}}
    <button id="btnScrollTop" class="btn-scroll-top" title="Volver al inicio">
        <i class="ti ti-chevrons-up" style="font-size: 1.5rem;"></i>
    </button>

    {{-- CONTENEDOR DE ALERTAS DE ESTADO GLOBAL --}}
    <div id="status-container" style="position: fixed; top: 100px; left: 50%; transform: translateX(-50%); z-index: 9999; width: 90%; max-width: 400px;"></div>

    {{-- SCRIPTS COMPLEMENTARIOS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const btnUp = document.getElementById("btnScrollTop");

        window.onscroll = function() {
            if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
                btnUp.style.display = "block";
            } else {
                btnUp.style.display = "none";
            }
        };

        btnUp.onclick = function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        };

        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const msgType = urlParams.get('msg');

            if (msgType === 'login') {
                crearCartel("¡Has iniciado sesión correctamente!");
            } else if (msgType === 'register') {
                crearCartel("¡Cuenta creada exitosamente!");
            }
        }

        function crearCartel(texto) {
            const container = document.getElementById('status-container');
            if (!container) return;

            const alerta = document.createElement('div');
            alerta.className = "hansip-font text-center py-3";
            alerta.style.cssText = "background-color: #c80d55; color: white; border-radius: 8px; border: 2px solid white; box-shadow: 0 4px 15px rgba(0,0,0,0.5);";
            alerta.innerText = texto;

            container.appendChild(alerta);

            setTimeout(() => {
                alerta.style.transition = "opacity 0.6s ease";
                alerta.style.opacity = "0";
                setTimeout(() => alerta.remove(), 600);
            }, 3000);
        }
    </script>

    {{-- PANEL LATERAL DEL INVENTARIO (DESPLIEGUE DERECHO) --}}
    @auth
        <div class="offcanvas offcanvas-end bg-black text-white border-start border-magenta" tabindex="-1" id="inventarioLateral" style="width: 380px;">
            <div class="offcanvas-header border-bottom border-secondary">
                <h5 class="offcanvas-title hansip-font" style="color: #c80d55;"><i class="ti ti-box"></i> MINI INVENTARIO</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
            </div>

            <div class="offcanvas-body d-flex flex-column justify-content-between">
                @if(count($cart) > 0)
                    {{-- Lista de productos acumulados --}}
                    <div class="overflow-y-auto flex-grow-1 pe-1" style="max-height: 70vh;">
                        @php $totalAcumulado = 0; @endphp
                       @foreach($cart as $id => $details)
                            @php $totalAcumulado += $details['precio'] * $details['cantidad']; @endphp
                            <div class="d-flex align-items-center justify-content-between border-bottom border-secondary py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ asset('img/' . $details['imagen']) }}" style="width: 50px; height: 50px; object-fit: contain; background: #121212;" class="border border-secondary p-1">
                                    <div>
                                        <h6 class="mb-0 small text-white fw-bold">{{ $details['nombre'] }}</h6>
                                        <small class="text-secondary">{{ $details['cantidad'] }} x ${{ number_format($details['precio'], 0, ',', '.') }}</small>
                                    </div>
                                </div>

                                {{-- Contenedor de precio y botón de eliminar --}}
                                <div class="d-flex align-items-center gap-3">
                                    <span class="text-magenta small hansip-font">${{ number_format($details['precio'] * $details['cantidad'], 0, ',', '.') }}</span>

                                    {{-- Formulario táctico para remover el ítem --}}
                                    <form action="{{ route('cart.remove', $id) }}" method="POST" class="m-0 p-0">
                                        @csrf
                                        <button type="submit" class="btn p-0 border-0 text-secondary btn-delete-tactic" title="Remover Suministro" style="background: transparent; cursor: pointer;">
                                            <i class="ti ti-trash" style="font-size: 1.1rem; transition: 0.3s;"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Footer del panel con el Total y Botones de Acción --}}
                    <div class="border-top border-secondary pt-3 mt-auto">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="hansip-font small text-secondary">TOTAL ESTIMADO:</span>
                            <span class="text-magenta h4 hansip-font">${{ number_format($totalAcumulado, 0, ',', '.') }}</span>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="{{ route('cart.index') }}" class="btn btn-outline-light rounded-0 hansip-font py-2" style="font-size: 0.8rem; letter-spacing: 1px;">
                                VER INVENTARIO COMPLETO
                            </a>
                            <form action="{{ route('cart.confirm') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-magenta hansip-font">
                                    PROCESAR OPERACIÓN
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    {{-- Estado vacío del inventario --}}
                    <div class="text-center my-auto py-5 opacity-50">
                        <i class="ti ti-package-off text-secondary mb-2" style="font-size: 3rem;"></i>
                        <p class="hansip-font text-secondary small">INVENTARIO VACÍO // SIN SUMINISTROS</p>
                    </div>
                @endif
            </div>
        </div>
    @endauth
</body>
</html>
