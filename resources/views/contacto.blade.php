<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Mi Sitio</a>
            <div class="navbar-nav">
                <a class="nav-link" href="/">Inicio</a>
                <a class="nav-link active" href="/contacto">Contacto</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow">¿'
            <div class="card-body">
                <h2>Formulario de contacto</h2>
                <form action="{{ url('/contacto') }}" method="POST">
                    @csrf <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mensaje</label>
                        <textarea name="mensaje" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Enviar mensaje</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
