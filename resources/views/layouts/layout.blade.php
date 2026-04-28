<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Acá definís el nombre que se ve en la pestaña --}}
    <title>StanLee Sin</title>

    {{-- Acá va el logo de Lee Sin que descargaste --}}
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    {{-- El resto de tus links de CSS o fuentes van acá abajo --}}
</head>
<body>
    @yield('content')
</body>
</html>
