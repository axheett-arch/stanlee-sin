<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Usos | StanLee Sin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}?v=1.1">

    <style>
        @font-face {
            font-family: 'HansipCustom';
            src: url("{{ asset('fonts/Hansip.ttf') }}") format('truetype');
        }

        :root {
            --magenta-stanley: #c80d55;
            --negro-fondo: #121212;
        }

        body {
            background: radial-gradient(circle at top right, #1a1a1a 0%, #000000 100%);
            color: white;
            font-family: sans-serif;
        }

        .hansip-font,
        h1,
        h2 {
            font-family: 'HansipCustom', sans-serif !important;
            color: var(--magenta-stanley);
            text-transform: uppercase;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(200, 13, 85, 0.2);
            border-radius: 15px;
            padding: 2rem;
        }

        .btn-stanley-legend {
            background-color: #c80d55 !important;
            color: white !important;
            font-family: 'HansipCustom', sans-serif !important;
            font-size: 1.3rem !important;
            padding: 15px 45px !important;
            text-decoration: none !important;
            display: inline-block !important;
            border: none !important;
            clip-path: polygon(10% 0%, 100% 0%, 90% 100%, 0% 100%) !important;
            transition: all 0.3s ease;
        }

        .btn-stanley-legend:hover {
            background-color: white !important;
            color: #c80d55 !important;
            transform: scale(1.05);
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

    <div class="container mt-5 pt-4">
        <h1 class="text-center mb-5" style="font-size: 4rem;">Términos y Usos</h1>

        <div class="glass-card mb-5">
            <div class="space-y-12">

                <section class="mb-5">
                    <div class="d-flex align-items-center mb-3">
                        <span class="hansip-font me-3" style="font-size: 1.5rem; color: white;">01.</span>
                        <h2 class="h4 mb-0">Titularidad y Objeto del Sitio</h2>
                    </div>
                    <p class="text-secondary leading-relaxed">
                        El presente sitio web <span class="text-white font-bold">stanlee-sin.test</span> es propiedad
                        exclusiva de <span class="text-magenta">Axel & Tiago Devs</span>. StanLee Sin se dedica a la
                        comercialización y personalización de recipientes térmicos de alta gama, enfocados en la cultura
                        urbana y la resistencia técnica. Al navegar o comprar en este sitio, el usuario acepta de forma
                        vinculante estos Términos y Usos.
                    </p>
                </section>

                <section class="mb-5">
                    <div class="d-flex align-items-center mb-3">
                        <span class="hansip-font me-3" style="font-size: 1.5rem; color: white;">02.</span>
                        <h2 class="h4 mb-0">Comercialización y Precios</h2>
                    </div>
                    <p class="text-secondary leading-relaxed">
                        Todos los precios están expresados en Pesos Argentinos (ARS) e incluyen los impuestos de ley.
                        Nos reservamos el derecho de modificar los precios sin previo aviso por fluctuaciones de mercado
                        o stock.
                        <br><br>
                        <strong class="text-white">Validación:</strong> La compra solo se considera "Cerrada" una vez
                        que el sistema de pagos confirme la acreditación del dinero. En caso de falta de stock posterior
                        a la compra, se ofrecerá un cambio de modelo o el reembolso total al cliente en un plazo máximo
                        de 48 hs.
                    </p>
                </section>

                <section class="mb-5">
                    <div class="d-flex align-items-center mb-3">
                        <span class="hansip-font me-3" style="font-size: 1.5rem; color: white;">03.</span>
                        <h2 class="h4 mb-0">Envíos, Entregas y Tiempos</h2>
                    </div>
                    <div class="text-secondary leading-relaxed">
                        <ul class="list-unstyled">
                            <li class="mb-2"><strong class="text-white">Zonas de Entrega:</strong> Despachamos desde
                                Corrientes a todo el territorio nacional.</li>
                            <li class="mb-2"><strong class="text-white">Tiempos de Despacho:</strong> El procesamiento
                                de pedidos de catálogo demora de 1 a 2 días hábiles. Pedidos personalizados pueden
                                demorar hasta 5 días hábiles adicionales.</li>
                            <li class="mb-2"><strong class="text-white">Responsabilidad:</strong> StanLee Sin utiliza
                                servicios de logística de terceros. No somos responsables por paros de transporte,
                                incidentes climáticos o demoras logísticas ajenas a nuestra gestión, aunque garantizamos
                                el seguimiento activo del paquete.</li>
                        </ul>
                    </div>
                </section>

                <section class="mb-5">
                    <div class="d-flex align-items-center mb-3">
                        <span class="hansip-font me-3" style="font-size: 1.5rem; color: white;">04.</span>
                        <h2 class="h4 mb-0">Garantía y Soporte Postventa</h2>
                    </div>
                    <p class="text-secondary leading-relaxed">
                        Nuestros productos son originales y cuentan con la garantía oficial Stanley por defectos de
                        fabricación (como la pérdida de vacío o temperatura).
                        <br><br>
                        <strong class="text-white">Exclusiones:</strong> La garantía NO cubre daños estéticos por uso
                        (rayones, abolladuras por caídas), maltrato del grabado personalizado por uso de productos
                        abrasivos (lavandina, esponjas de acero) o fuego directo.
                        <br><br>
                        Para gestionar una garantía, el usuario debe presentar el comprobante de compra y enviarnos
                        fotos/videos de la falla vía <span class="text-magenta">Consultas</span>.
                    </p>
                </section>

                <section class="mb-5">
                    <div class="d-flex align-items-center mb-3">
                        <span class="hansip-font me-3" style="font-size: 1.5rem; color: white;">05.</span>
                        <h2 class="h4 mb-0">Derecho de Revocación (Arrepentimiento)</h2>
                    </div>
                    <p class="text-secondary leading-relaxed">
                        Según la ley de defensa al consumidor, el cliente tiene 10 días corridos para revocar su compra.
                        El producto debe ser devuelto en su <span class="text-white">empaque original, sin uso y con
                            todas sus etiquetas</span>.
                        <br><br>
                        <strong class="text-white">Nota Importante:</strong> Los productos con grabado personalizado
                        por pedido del cliente NO tienen devolución, salvo por fallas técnicas en el material, debido a
                        su naturaleza de bien personalizado único.
                    </p>
                </section>

                <section class="mb-5">
                    <div class="d-flex align-items-center mb-3">
                        <span class="hansip-font me-3" style="font-size: 1.5rem; color: white;">06.</span>
                        <h2 class="h4 mb-0">Privacidad y Seguridad</h2>
                    </div>
                    <p class="text-secondary leading-relaxed">
                        Los datos recolectados (DNI, Dirección, Teléfono) son utilizados estrictamente para la logística
                        y facturación. StanLee Sin no almacena datos de tarjetas de crédito; todas las transacciones se
                        procesan de forma segura a través de plataformas externas de pago cifradas.
                    </p>
                </section>

                <section>
                    <div class="d-flex align-items-center mb-3">
                        <span class="hansip-font me-3" style="font-size: 1.5rem; color: white;">07.</span>
                        <h2 class="h4 mb-0">Propiedad Intelectual</h2>
                    </div>
                    <p class="text-secondary leading-relaxed">
                        La marca <span class="text-white">StanLee Sin</span>, la tipografía <span><strong
                                class="text-white">HansipCustom:</strong> y el diseño de esta web son propiedad
                            intelectual de sus desarrolladores. Queda terminantemente prohibida la copia total o parcial
                            del contenido gráfico o código fuente sin permiso explícito.
                    </p>
                </section>

            </div>
            <div class="text-center mt-5 pt-4">
                <a href="/" class="btn-stanley-legend">
                    VOLVER AL HOME
                </a>
            </div>
        </div>
    </div>

    <footer class="text-center py-4 mt-5 border-top border-secondary text-secondary">
        <p>&copy; 2026 StanLee Sin - Axel & Tiago </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
