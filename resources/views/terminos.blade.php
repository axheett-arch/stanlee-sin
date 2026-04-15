<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Usos - StanLee Sin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* 1. Usamos tu configuración exacta de fuentes */
        @font-face {
            font-family: 'HansipCustom';
            src: url("{{ asset('fonts/Hansip.ttf') }}") format('truetype');
        }

        :root {
            --magenta-stanley: #c80d55;
            --negro-fondo: #121212;
        }

        /* 2. Fondo con tu gradiente radial */
        body {
            background: radial-gradient(circle at top right, #1a1a1a 0%, #000000 100%);
            color: white;
            font-family: sans-serif;
            min-height: screen;
            margin: 0;
        }

        /* 3. Títulos con tu fuente y color magenta */
        .hansip-font,
        h1,
        h2 {
            font-family: 'HansipCustom', sans-serif !important;
            color: var(--magenta-stanley);
            text-transform: uppercase;
        }

        /* 4. Scrollbar personalizada tuya */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #000;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--magenta-stanley);
            border-radius: 10px;
        }

        /* Estilo para los bloques de contenido */
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(200, 13, 85, 0.2);
            border-radius: 15px;
        }

        /* Tu botón con forma de trapecio */
        .btn-stanley-legend {
            background-color: var(--magenta-stanley) !important;
            color: white !important;
            font-family: 'HansipCustom', sans-serif !important;
            font-size: 1.1rem !important;
            padding: 12px 40px !important;
            text-decoration: none !important;
            display: inline-block !important;
            border: none !important;
            clip-path: polygon(10% 0%, 100% 0%, 90% 100%, 0% 100%) !important;
            transition: all 0.3s ease;
        }

        .btn-stanley-legend:hover {
            background-color: white !important;
            color: var(--magenta-stanley) !important;
            transform: scale(1.05);
        }
    </style>
</head>

<body class="antialiased">

    <div class="py-16 px-4">
        <div class="max-w-5xl mx-auto">

            <h1 class="text-5xl md:text-7xl text-center mb-16 tracking-tighter">
                Términos y Usos
            </h1>

            <div class="glass-card p-8 md:p-12 space-y-12 mb-12">

                <section>
                    <h2 class="text-2xl mb-4">01. Aviso Legal</h2>
                    <p class="text-gray-400 text-lg leading-relaxed">
                        Bienvenido a <span class="text-white font-bold">StanLee Sin</span>. El acceso y uso de este
                        sitio web están sujetos a los términos detallados a continuación. Al navegar, aceptás nuestra
                        estética y nuestras reglas del juego.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl mb-4">02. Servicios y Productos</h2>
                    <p class="text-gray-400 text-lg leading-relaxed">
                        Ofrecemos termos Stanley originales con personalización de alto impacto. Nos enfocamos en el
                        estilo urbano y la resistencia extrema. Los servicios pueden variar según el stock y la demanda
                        de la calle.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl mb-4">03. Envíos y Garantías</h2>
                    <p class="text-gray-400 text-lg leading-relaxed">
                        <strong class="text-white">Entregas:</strong> Despachamos a todo el país. Los tiempos varían
                        entre 3 y 7 días hábiles.<br>
                        <strong class="text-white">Postventa:</strong> Si tu producto tiene fallas de fábrica, tenés
                        soporte garantizado. El flow no se negocia.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl mb-4">04. Privacidad</h2>
                    <p class="text-gray-400 text-lg leading-relaxed">
                        Tus datos están blindados. Solo los usamos para que el termo llegue a tus manos. No compartimos
                        info con terceros.
                    </p>
                </section>

            </div>

            <div class="text-center">
                <a href="/" class="btn-stanley-legend">
                    VOLVER AL INICIO
                </a>
            </div>

        </div>
    </div>

</body>

</html>
