@extends('layouts.plantilla')

@section('contenido')
<div class="py-5">
    <h1 class="hansip-font mb-5" style="font-size: clamp(2.5rem, 6vw, 4rem);">
        PUNTOS DE <span class="text-magenta">VENTA</span>
    </h1>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card-esencia p-4 h-100">
                <h3 class="hansip-font h4 mb-4 text-white">📦 LOGÍSTICA URBANA</h3>
                <ul class="list-unstyled text-secondary fs-5">
                    <li class="mb-3">
                        <strong class="text-white">ENVÍOS LOCALES:</strong><br>
                        Cadetería propia en <span class="text-magenta">Corrientes Capital</span>. Si pedís antes de las 12:00, te llega en el día.
                    </li>
                    <li class="mb-3">
                        <strong class="text-white">TODO EL PAÍS:</strong><br>
                        Despachamos por Correo Argentino los días martes y viernes.
                    </li>
                    <li>
                        <strong class="text-white">PICK UP POINT:</strong><br>
                        Retirá gratis en nuestro bunker del barrio (coordinar por WhatsApp).
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card-esencia p-4 h-100">
                <h3 class="hansip-font h4 mb-4 text-white">💳 MÉTODOS DE PAGO</h3>
                <div class="mb-4">
                    <p class="text-secondary">Aceptamos todas las opciones para que no tengas excusas:</p>
                </div>

                <div class="d-flex flex-column gap-3">
                    <div class="p-3 border border-secondary bg-black">
                        <span class="text-magenta fw-bold">EFECTIVO:</span>
                        <span class="text-white"> 15% DE DESCUENTO</span> (Solo retiros presenciales).
                    </div>
                    <div class="p-3 border border-secondary bg-black">
                        <span class="text-magenta fw-bold">TRANSFERENCIA:</span>
                        <span class="text-white"> Precio de lista.</span> (Alias: StanLee.Sin.Corrientes).
                    </div>
                    <div class="p-3 border border-secondary bg-black">
                        <span class="text-magenta fw-bold">MERCADO PAGO:</span>
                        <span class="text-white"> Hasta 3 cuotas</span> con el recargo de la plataforma.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 p-4 border-top border-secondary text-center">
        <p class="hansip-font text-white mb-0" style="letter-spacing: 2px;">
            TODOS NUESTROS PRODUCTOS TIENEN <span class="text-magenta">GARANTÍA DE POR VIDA</span>
        </p>
    </div>
</div>
@endsection
