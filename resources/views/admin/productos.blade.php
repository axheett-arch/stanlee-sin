@extends('layouts.plantilla')

@section('contenido')
<div class="py-5 text-white">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="hansip-font mb-1">PANEL <span class="text-magenta">ADMINISTRADOR</span></h1>
            <p class="text-secondary small font-monospace mb-0">// CONTROL DE INVENTARIO GENERAL // BUSCADOR ASÍNCRONO</p>
        </div>
        <a href="{{ route('admin.create') }}" class="btn text-white hansip-font btn-sm rounded-0 px-4 py-2 text-decoration-none" style="background-color: #c80d55;">
            <i class="ti ti-plus me-1"></i> NUEVO SUMINISTRO
        </a>
    </div>

    {{-- Buscador Reactivo en Tiempo Real (Ya no requiere botón Filtrar) --}}
    <div class="mb-4 d-flex justify-content-start">
        <div class="input-group" style="max-width: 450px;">
            <span class="input-group-text bg-dark border-secondary text-secondary rounded-0 font-monospace" style="font-size: 0.85rem;">// LIVE SEARCH:</span>
            <input type="text" id="input-busqueda" class="form-control bg-black border-secondary text-white rounded-0 font-monospace" placeholder="Escribí la designación del item..." autocomplete="off">
        </div>
    </div>

    {{-- Contenedor de la Tabla General --}}
    <div class="card-esencia p-4 border-magenta bg-black" style="box-shadow: 0 0 20px rgba(200, 13, 85, 0.15);">
        <div class="table-responsive">
            <table class="table table-dark align-middle mb-0 text-white" style="--bs-table-bg: transparent;">
                <thead>
                    <tr class="text-magenta hansip-font small" style="border-bottom: 2px solid #c80d55;">
                        <th>ID</th>
                        <th>IMAGEN</th>
                        <th>SUMINISTRO</th>
                        <th>PRECIO</th>
                        <th class="text-center">PRINCIPAL</th>
                        <th class="text-center">ESTADO LÓGICO</th>
                        <th class="text-end">ACCIONES</th>
                    </tr>
                </thead>
                <tbody id="contenedor-productos">
                    {{-- Inyectamos el partial inicial --}}
                    @include('admin.partials.productos-filas')
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .border-magenta { border: 1px solid #c80d55 !important; }
    .btn-outline-danger:hover { background-color: #dc3545; color: white; }
    .btn-outline-success:hover { background-color: #198754; color: white; }
    .btn-outline-warning:hover { background-color: #ffc107; color: black; }

    /* Efecto de enfoque neón para la estrella apagada */
    .btn-estrella {
        border: none;
        background: transparent;
        transition: color 0.2s ease, transform 0.2s ease;
    }
    .btn-estrella:hover {
        color: #ffc107 !important;
        transform: scale(1.15);
    }

    .btn-outline-magenta { border: 1px solid #c80d55; color: #c80d55; }
    .btn-outline-magenta:hover { background-color: #c80d55; color: white; }
</style>

{{-- 🧠 MOTOR JS FETCH (BÚSQUEDA ASÍNCRONA) --}}
<script>
    document.getElementById('input-busqueda').addEventListener('input', function(e) {
        let valorBusqueda = e.target.value;

        // Mandamos la petición invisible pasándole el parámetro por la URL
        fetch(`{{ route('admin.index') }}?buscar=${encodeURIComponent(valorBusqueda)}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest' // Le indica al AdminController que responda vía AJAX
            }
        })
        .then(response => response.text())
        .then(html => {
            // Reemplazamos dinámicamente las filas del tbody sin alterar el resto de la web
            document.getElementById('contenedor-productos').innerHTML = html;
        })
        .catch(error => console.error('Error en el filtrado táctico:', error));
    });
</script>
@endsection
