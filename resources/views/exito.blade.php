<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensaje Recibido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Mi Sitio</a>
        </div>
    </nav>

   <div class="container mt-5">
    <div class="card shadow border-success text-center">
        <div class="card-body">
            <h2 class="text-success">¡Envío Exitoso!</h2>
            <hr>
            <p class="lead">
                Hola <strong>{{ $nombre }}</strong>, qué bueno recibir tu mensaje.
                Un miembro del equipo se comunicará con vos al correo:
                <strong>{{ $email }}</strong>. ¡Muchas gracias!
            </p>
            <a href="/contacto" class="btn btn-primary">Volver al formulario</a>
        </div>
    </div>
</div>
</body>
</html>
