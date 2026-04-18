
@extends('layouts.plantilla')

@section('contenido')
<div class="hero-consultas text-center py-5">
    <h1 class="hansip-font" style="font-size: clamp(2.5rem, 6vw, 4rem); color: white;">
        ¿EN QUÉ PODEMOS <span class="text-magenta">AYUDARTE?</span>
    </h1>
    <p class="text-secondary hansip-font" style="font-size: 0.8rem; letter-spacing: 2px;">
        CENTRO DE SOPORTE OFICIAL — STANLEE SIN
    </p>
</div>

<div class="container mb-5" style="max-width: 850px;">
    <div class="accordion" id="accordionFAQ">

        <h3 class="hansip-font mb-4 mt-5" style="color: var(--magenta-stanley); border-left: 4px solid var(--magenta-stanley); padding-left: 15px; font-size: 1.3rem;">
            ENVÍOS Y LOGÍSTICA
        </h3>

        <div class="accordion-item bg-black border-secondary mb-2">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-black text-white hansip-font shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#envio1">
                    ¿CUAL ES EL COSTO DE ENVÍO?
                </button>
            </h2>
            <div id="envio1" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                <div class="accordion-body text-secondary border-top border-secondary">
                    El costo depende de tu ubicación. Podés calcularlo en el carrito antes de finalizar la compra ingresando tu código postal. Realizamos envíos a todo el país.
                </div>
            </div>
        </div>

        <div class="accordion-item bg-black border-secondary mb-2">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-black text-white hansip-font shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#envio2">
                    ¿COMO HAGO EL SEGUIMIENTO DE MI PEDIDO?
                </button>
            </h2>
            <div id="envio2" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                <div class="accordion-body text-secondary border-top border-secondary">
                    Una vez despachado, te enviaremos un código de seguimiento de Correo Argentino o la empresa logística asignada a tu email para que controles el trayecto en tiempo real.
                </div>
            </div>
        </div>

        <h3 class="hansip-font mb-4 mt-5" style="color: var(--magenta-stanley); border-left: 4px solid var(--magenta-stanley); padding-left: 15px; font-size: 1.3rem;">
            PRODUCTOS Y TÉCNICA
        </h3>

        <div class="accordion-item bg-black border-secondary mb-2">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-black text-white hansip-font shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#prod1">
                    ¿CUANTO TIEMPO MANTIENEN EL CALOR?
                </button>
            </h2>
            <div id="prod1" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                <div class="accordion-body text-secondary border-top border-secondary">
                    Nuestros termos cuentan con aislamiento de doble capa al vacío. Dependiendo del modelo, mantienen el calor entre 20 y 40 horas, y el frío hasta por 4 días si se usa hielo.
                </div>
            </div>
        </div>

        <div class="accordion-item bg-black border-secondary mb-2">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-black text-white hansip-font shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#prod2">
                    ¿PUEDO CAMBIAR UN PRODUCTO PERSONALIZADO?
                </button>
            </h2>
            <div id="prod2" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                <div class="accordion-body text-secondary border-top border-secondary">
                    Debido a su naturaleza única, los productos con grabado personalizado no tienen cambio ni devolución, salvo por fallas técnicas demostrables en el material Stanley.
                </div>
            </div>
        </div>

        <h3 class="hansip-font mb-4 mt-5" style="color: var(--magenta-stanley); border-left: 4px solid var(--magenta-stanley); padding-left: 15px; font-size: 1.3rem;">
            PAGOS Y SEGURIDAD
        </h3>

        <div class="accordion-item bg-black border-secondary mb-2">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-black text-white hansip-font shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#pago1">
                    ¿TIENEN DESCUENTOS POR TRANSFERENCIA?
                </button>
            </h2>
            <div id="pago1" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                <div class="accordion-body text-secondary border-top border-secondary">
                    ¡Sí! Pagando por transferencia bancaria directa tenés un <span class="text-magenta">15% de descuento</span> sobre el precio de lista. Los datos te llegan al finalizar la orden.
                </div>
            </div>
        </div>

        <div class="accordion-item bg-black border-secondary mb-2">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed bg-black text-white hansip-font shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#pago2">
                    ¿ES SEGURO PAGAR CON TARJETA?
                </button>
            </h2>
            <div id="pago2" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                <div class="accordion-body text-secondary border-top border-secondary">
                    Totalmente. Utilizamos pasarelas de pago con cifrado SSL. StanLee Sin nunca accede ni guarda los datos de tu tarjeta, todo se procesa de forma externa y segura.
                </div>
            </div>
        </div>

    </div>

    <div class="card-esencia mt-5 text-center p-4" style="border-style: dashed !important; border-color: rgba(200, 13, 85, 0.5) !important;">
        <h4 class="hansip-font mb-3" style="font-size: 1.1rem; color: white;">
            ¿TU DUDA SIGUE <span class="text-magenta">EN LAS SOMBRAS?</span>
        </h4>
        <p class="text-secondary small mb-4">Si no encontraste lo que buscabas, mandanos un mensaje directo y la crew te responde en breve.</p>

        <a href="/contacto" class="btn-consultas-outline text-decoration-none text-white">
            HABLAR CON LA CREW
        </a>
    </div>

    <div class="text-center mt-5">
        <a href="/" class="btn-stanley-legend">
            VOLVER AL INICIO
        </a>
    </div>
</div>

<style>
    .accordion-button:not(.collapsed) {
        background-color: #111 !important;
        color: var(--magenta-stanley) !important;
    }
    .accordion-button::after {
        filter: invert(1);
    }
</style>

@endsection
