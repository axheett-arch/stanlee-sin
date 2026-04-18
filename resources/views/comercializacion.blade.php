@extends('layouts.plantilla')

@section('contenido')
<div class="py-5">
    <div class="text-center mb-5">
        <h1 class="hansip-font" style="font-size: clamp(2.5rem, 6vw, 4.5rem);">
            SISTEMA DE <span class="text-magenta">VENTAS</span>
        </h1>
        <p class="text-secondary hansip-font" style="letter-spacing: 3px; font-size: 0.8rem;">
            DISTRIBUCIÓN TÉCNICA Y LOGÍSTICA URBANA
        </p>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card-esencia p-4 h-100 border-magenta">
                <h3 class="hansip-font h4 mb-4 text-white d-flex align-items-center">
                    <span class="text-magenta me-3">//</span> LOGÍSTICA
                </h3>
                <ul class="list-unstyled text-secondary">
                    <li class="mb-4">
                        <strong class="text-white d-block hansip-font mb-1" style="font-size: 0.9rem;">ENTREGAS LOCALES:</strong>
                        Cadetería propia en <span class="text-magenta fw-bold">Corrientes Capital</span>.
                        Pedidos antes de las 12:00hs se entregan en la franja de la tarde.
                    </li>
                    <li class="mb-4">
                        <strong class="text-white d-block hansip-font mb-1" style="font-size: 0.9rem;">DESPACHOS NACIONALES:</strong>
                        Envíos a todo el país vía <span class="text-white">Correo Argentino</span>.
                        Salidas programadas: Martes y Viernes.
                    </li>
                    <li class="mb-0">
                        <strong class="text-white d-block hansip-font mb-1" style="font-size: 0.9rem;">PUNTO DE EXTRACCIÓN:</strong>
                        Retiro sin cargo en nuestro <span class="text-magenta fw-bold">Búnker</span> (Zona Norte).
                        Coordinación previa vía canales oficiales.
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card-esencia p-4 h-100">
                <h3 class="hansip-font h4 mb-4 text-white d-flex align-items-center">
                    <span class="text-magenta me-3">//</span> FINANCIACIÓN
                </h3>

                <div class="d-flex flex-column gap-3">
                    <div class="p-3 border border-secondary bg-black d-flex justify-content-between align-items-center transition-all hover-magenta">
                        <div>
                            <span class="text-magenta hansip-font d-block" style="font-size: 0.7rem;">CASH</span>
                            <span class="text-white fw-bold">EFECTIVO</span>
                        </div>
                        <span class="badge bg-magenta">-15% OFF</span>
                    </div>

                    <div class="p-3 border border-secondary bg-black">
                        <span class="text-magenta hansip-font d-block" style="font-size: 0.7rem;">WIRE TRANSFER</span>
                        <span class="text-white fw-bold">TRANSFERENCIA / CVU</span>
                        <p class="text-secondary small mb-0 mt-1">Alias: <span class="text-white">StanLee.Sin.Corrientes</span></p>
                    </div>

                    <div class="p-3 border border-secondary bg-black">
                        <span class="text-magenta hansip-font d-block" style="font-size: 0.7rem;">DIGITAL WALLET</span>
                        <span class="text-white fw-bold">MERCADO PAGO</span>
                        <p class="text-secondary small mb-0 mt-1">Hasta 3 cuotas (consultar recargo).</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card-esencia p-4 text-center">
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <span class="text-magenta hansip-font fs-4">01</span>
                        <p class="text-white small hansip-font mt-2">ELEGÍ TU EQUIPO</p>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <span class="text-magenta hansip-font fs-4">02</span>
                        <p class="text-white small hansip-font mt-2">PERSONALIZA EL TAG</p>
                    </div>
                    <div class="col-md-4">
                        <span class="text-magenta hansip-font fs-4">03</span>
                        <p class="text-white small hansip-font mt-2">RECIBÍ EN TU BÚNKER</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 p-4 border-top border-magenta text-center floating-anim">
        <p class="hansip-font text-white mb-0" style="letter-spacing: 2px; font-size: 1.1rem;">
            RESISTENCIA <span class="text-magenta">LEGENDARIA</span> COMPROBADA
        </p>
    </div>
</div>

<style>
    .hover-magenta:hover {
        border-color: var(--magenta-stanley) !important;
        box-shadow: 0 0 10px rgba(200, 13, 85, 0.2);
    }
    .bg-magenta {
        background-color: var(--magenta-stanley);
    }
</style>
@endsection
