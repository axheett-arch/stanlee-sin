<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas | StanLee Sin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}?v=1.1">

    <style>
        .hero-consultas {
            padding: 120px 20px 20px;
            text-align: center;
        }

        .titulo-principal {
            font-family: 'HansipCustom', sans-serif !important;
            font-size: 3.5rem;
            color: white;
            margin-bottom: 10px;
        }

        /* Estilos para el acordeón desplegable */
        .accordion-item {
            background-color: #181818 !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            margin-bottom: 10px;
            border-radius: 8px !important;
            overflow: hidden;
        }

        .accordion-button {
            background-color: #181818 !important;
            color: white !important;
            font-family: sans-serif;
            font-weight: bold;
            box-shadow: none !important;
            padding: 1.2rem;
        }

        .accordion-button:not(.collapsed) {
            color: #c80d55 !important;
            border-bottom: 1px solid rgba(200, 13, 85, 0.3);
            background-color: #1a1a1a !important;
        }

        .accordion-button::after {
            filter: invert(1);
        }

        .accordion-body {
            color: #bbb;
            background-color: #121212;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .apartado-titulo {
            color: #c80d55;
            margin-top: 40px;
            margin-bottom: 15px;
            font-size: 1.3rem;
            letter-spacing: 2px;
            border-left: 4px solid #c80d55;
            padding-left: 15px;
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
        <p class="text-secondary hansip-font" style="font-size: 0.8rem;">Centro de Soporte Oficial</p>
    </div>

    <div class="container mb-5" style="max-width: 850px;">

        <div class="accordion" id="accordionFAQ">

            <h3 class="hansip-font apartado-titulo">ENVÍOS Y ENTREGA</h3>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#envio1">
                        ¿Cuál es el costo de envío?
                    </button>
                </h2>
                <div id="envio1" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        El costo depende de tu ubicación. Podés calcularlo en el carrito antes de finalizar la compra
                        ingresando tu código postal. Realizamos envíos a todo el país.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#envio2">
                        ¿Cuánto demora en llegar mi pedido?
                    </button>
                </h2>
                <div id="envio2" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Los productos de catálogo se despachan en 24/48hs hábiles. El tiempo de tránsito del correo
                        suele ser de 3 a 7 días hábiles según la provincia.
                    </div>
                </div>
            </div>

            <h3 class="hansip-font apartado-titulo">PRODUCTOS Y PERSONALIZACIÓN</h3>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#prod1">
                        ¿Los productos tienen garantía?
                    </button>
                </h2>
                <div id="prod1" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Sí, todos los termos cuentan con garantía por fallas de fabricación (pérdida de vacío). No cubre
                        daños por mal uso, caídas o productos abrasivos sobre el grabado.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#prod2">
                        ¿Cómo cuido el grabado de mi termo?
                    </button>
                </h2>
                <div id="prod2" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Recomendamos lavar a mano con esponja suave y jabón neutro. Evitá el lavavajillas y esponjas de
                        acero para mantener la estética urbana intacta.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#prod3">
                        ¿Puedo encargar un diseño totalmente personalizado?
                    </button>
                </h2>
                <div id="prod3" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        ¡Claro! Trabajamos diseños a pedido. Podés contactarnos por WhatsApp para pasarnos tu idea y
                        armamos el presupuesto.
                    </div>
                </div>
            </div>

            <h3 class="hansip-font apartado-titulo">PAGOS Y SEGURIDAD</h3>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#pago1">
                        ¿Qué tarjetas aceptan?
                    </button>
                </h2>
                <div id="pago1" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Aceptamos todas las tarjetas de crédito y débito a través de plataformas seguras. También podés
                        pagar vía transferencia bancaria con un descuento especial.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#pago2">
                        ¿Es seguro comprar en la web?
                    </button>
                </h2>
                <div id="pago2" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                    <div class="accordion-body">
                        Totalmente. Contamos con certificados de seguridad SSL y tus datos bancarios están cifrados,
                        nunca quedan guardados en nuestro sistema.
                    </div>
                </div>
            </div>

        </div>

        <div class="text-center mt-5">
            <a href="/" class="hansip-font text-white text-decoration-none px-5 py-3"
                style="background-color: #c80d55; clip-path: polygon(10% 0%, 100% 0%, 90% 100%, 0% 100%); display: inline-block;">
                VOLVER AL INICIO
            </a>
        </div>
    </div>


    <footer class="text-center py-4 mt-5 border-top border-secondary text-secondary">
        <p>&copy; 2026 StanLee Sin - Axel & Tiago </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
