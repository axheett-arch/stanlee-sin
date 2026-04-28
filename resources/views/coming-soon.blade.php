<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misión en Curso - Suministros Tácticos</title>
    <style>
        /* Importamos una fuente gamer/cyberpunk similar a la Hansip si no la tenés local */
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap');

        body {
            margin: 0;
            padding: 0;
            background-color: #000;
            background-image:
                linear-gradient(rgba(200, 13, 85, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(200, 13, 85, 0.05) 1px, transparent 1px);
            background-size: 30px 30px; /* Tamaño de la cuadrícula táctica */
            color: #fff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Orbitron', sans-serif; /* Fuente tipo gamer */
            overflow: hidden;
            position: relative;
        }

        /* Borde de neón magenta alrededor de toda la pantalla */
        body::before {
            content: '';
            position: absolute;
            top: 10px; bottom: 10px; left: 10px; right: 10px;
            border: 2px solid #ff0066;
            box-shadow: 0 0 15px rgba(255, 0, 102, 0.5);
            pointer-events: none;
            z-index: 10;
        }

        .container {
            text-align: center;
            position: relative;
            z-index: 20;
            padding: 20px;
        }

        /* --- Efecto Glitch para el Título --- */
        .glitch {
            font-size: clamp(2rem, 8vw, 3.5rem);
            font-weight: bold;
            text-transform: uppercase;
            color: #ff0066;
            position: relative;
            margin-bottom: 10px;
            text-shadow: 0.05em 0 0 rgba(255, 255, 255, 0.75),
                        -0.025em -0.05em 0 rgba(255, 255, 255, 0.75),
                        0.025em 0.05em 0 rgba(255, 255, 255, 0.75);
            animation: glitch 500ms infinite;
        }

        @keyframes glitch {
            0% { text-shadow: 0.05em 0 0 rgba(255, 255, 255, 0.75), -0.05em -0.025em 0 rgba(255, 255, 255, 0.75); }
            14% { text-shadow: 0.05em 0 0 rgba(255, 255, 255, 0.75), -0.05em -0.025em 0 rgba(255, 255, 255, 0.75); }
            15% { text-shadow: -0.05em -0.025em 0 rgba(255, 255, 255, 0.75), 0.025em 0.025em 0 rgba(255, 255, 255, 0.75); }
            49% { text-shadow: -0.05em -0.025em 0 rgba(255, 255, 255, 0.75), 0.025em 0.025em 0 rgba(255, 255, 255, 0.75); }
            50% { text-shadow: 0.025em 0.05em 0 rgba(255, 255, 255, 0.75), 0.05em 0 0 rgba(255, 255, 255, 0.75); }
            99% { text-shadow: 0.025em 0.05em 0 rgba(255, 255, 255, 0.75), 0.05em 0 0 rgba(255, 255, 255, 0.75); }
            100% { text-shadow: -0.025em 0 0 rgba(255, 255, 255, 0.75), -0.025em -0.025em 0 rgba(255, 255, 255, 0.75); }
        }

        .subtitle {
            font-size: 1rem;
            color: #b0b0b0;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 40px;
            font-family: sans-serif; /* Volvemos a sans-serif para lectura */
        }

        /* --- Botón Táctico Facha --- */
        .btn-volver {
            display: inline-block;
            padding: 15px 40px;
            background: #ff0066;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2rem;
            text-transform: uppercase;
            border: none;
            position: relative;
            transition: all 0.3s ease;
            clip-path: polygon(10% 0, 100% 0, 90% 100%, 0% 100%); /* Forma trapezoidal */
        }

        .btn-volver:hover {
            background: #fff;
            color: #ff0066;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
            transform: translateY(-2px);
        }

        /* Líneas de escaneo sutiles */
        .scanlines {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(to bottom, rgba(255,255,255,0) 50%, rgba(0,0,0,.1) 50%);
            background-size: 100% 4px;
            z-index: 15;
            pointer-events: none;
            opacity: 0.3;
        }

    </style>
</head>
<body>
    <div class="scanlines"></div> <div class="container">
        <h1 class="glitch" data-text="MISIÓN EN CURSO...">MISIÓN EN CURSO...</h1>
        <p class="subtitle">Aún estamos desarrollando esta sección del inventario // ACCESO RESTRINGIDO</p>

        <a href="{{ url('/') }}" class="btn-volver">
            VOLVER AL INICIO
        </a>
    </div>
</body>
</html>
