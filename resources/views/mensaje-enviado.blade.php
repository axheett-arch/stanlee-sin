<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suministro Confirmado - StanLee Sin</title>
   <style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap');

    body {
        margin: 0;
        background-color: #000;
        background-image:
            linear-gradient(rgba(200, 13, 85, 0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(200, 13, 85, 0.05) 1px, transparent 1px);
        background-size: 30px 30px;
        color: #fff;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Orbitron', sans-serif;
        overflow: hidden;
        position: relative;
    }

    /* Borde Magenta para mantener la línea de diseño */
    body::before {
        content: '';
        position: absolute;
        top: 10px; bottom: 10px; left: 10px; right: 10px;
        border: 2px solid #ff0066;
        box-shadow: 0 0 15px rgba(255, 0, 102, 0.4);
        pointer-events: none;
        z-index: 10;
    }

    .container {
        text-align: center;
        z-index: 20;
        padding: 20px;
    }

    .status-header {
        color: #ff0066; /* Volvemos al Magenta */
        font-size: clamp(1.5rem, 5vw, 2.5rem);
        text-transform: uppercase;
        margin-bottom: 10px;
        letter-spacing: 4px;
        text-shadow: 0 0 10px rgba(255, 0, 102, 0.5);
    }

    .message {
        color: #b0b0b0;
        font-size: 1rem;
        text-transform: uppercase;
        margin-bottom: 40px;
        font-family: sans-serif;
        letter-spacing: 1px;
    }

    .btn-home {
        display: inline-block;
        padding: 15px 40px;
        background: #ff0066;
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        clip-path: polygon(10% 0, 100% 0, 90% 100%, 0% 100%);
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-home:hover {
        background: #fff;
        color: #ff0066;
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
        transform: scale(1.05);
    }
</style>
</head>
<body>
    <div class="container">
        <h1 class="status-header">// CONSULTA RECIBIDA //</h1>
        <p class="message">Tu mensaje ha sido encriptado y enviado. Recibirás respuesta en tu terminal a la brevedad.</p>

        <a href="{{ url('/') }}" class="btn-home">
            VOLVER AL PANEL CENTRAL
        </a>
    </div>
</body>
</html>
