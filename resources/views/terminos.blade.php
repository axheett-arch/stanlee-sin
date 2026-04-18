@extends('layouts.plantilla')

@section('contenido')
<div class="py-5">
    <h1 class="text-center mb-5 hansip-font" style="font-size: clamp(2.5rem, 8vw, 4rem);">
        TÉRMINOS Y <span class="text-magenta">USOS</span>
    </h1>

    <div class="card-esencia mb-5" style="border-radius: 15px; background: rgba(255, 255, 255, 0.02) !important;">
        <div class="space-y-12">

            <section class="mb-5">
                <div class="d-flex align-items-center mb-3">
                    <span class="hansip-font me-3 text-white" style="font-size: 1.5rem;">01.</span>
                    <h2 class="h4 mb-0 text-magenta">Titularidad y Objeto</h2>
                </div>
                <p class="text-secondary">
                    El presente sitio web <span class="text-white fw-bold">stanlee-sin.test</span> es propiedad
                    exclusiva de <span class="text-magenta">Axel & Tiago Devs</span>. StanLee Sin se dedica a la
                    comercialización y personalización de recipientes térmicos de alta gama. Al navegar, el usuario acepta estos Términos.
                </p>
            </section>

            <section class="mb-5">
                <div class="d-flex align-items-center mb-3">
                    <span class="hansip-font me-3 text-white" style="font-size: 1.5rem;">02.</span>
                    <h2 class="h4 mb-0 text-magenta">Comercialización y Precios</h2>
                </div>
                <p class="text-secondary">
                    Precios en Pesos Argentinos (ARS). Nos reservamos el derecho de modificar precios por fluctuaciones de mercado.
                    <br><br>
                    <strong class="text-white">Validación:</strong> La compra se confirma una vez acreditado el pago. Reembolsos en máximo 48 hs si no hay stock.
                </p>
            </section>

            <section class="mb-5">
                <div class="d-flex align-items-center mb-3">
                    <span class="hansip-font me-3 text-white" style="font-size: 1.5rem;">03.</span>
                    <h2 class="h4 mb-0 text-magenta">Envíos y Logística</h2>
                </div>
                <ul class="list-unstyled text-secondary">
                    <li class="mb-2"><strong class="text-white">Zonas:</strong> Despachamos desde Corrientes a todo el país.</li>
                    <li class="mb-2"><strong class="text-white">Tiempos:</strong> Catálogo (1-2 días), Personalizados (hasta 5 días adicionales).</li>
                </ul>
            </section>

            <section class="mb-5">
                <div class="d-flex align-items-center mb-3">
                    <span class="hansip-font me-3 text-white" style="font-size: 1.5rem;">04.</span>
                    <h2 class="h4 mb-0 text-magenta">Garantía Stanley</h2>
                </div>
                <p class="text-secondary">
                    Productos originales con garantía por defectos de fabricación.
                    <br><br>
                    <strong class="text-white">Exclusiones:</strong> No cubre abolladuras por caídas o maltrato del grabado por productos abrasivos.
                </p>
            </section>

            <section class="mb-5">
                <div class="d-flex align-items-center mb-3">
                    <span class="hansip-font me-3 text-white" style="font-size: 1.5rem;">05.</span>
                    <h2 class="h4 mb-0 text-magenta">Derecho de Revocación</h2>
                </div>
                <p class="text-secondary">
                    Tenés 10 días para devolverlo sin uso. <strong class="text-white">IMPORTANTE:</strong> Los grabados personalizados NO tienen devolución.
                </p>
            </section>

            <section class="mb-5">
                <div class="d-flex align-items-center mb-3">
                    <span class="hansip-font me-3 text-white" style="font-size: 1.5rem;">06.</span>
                    <h2 class="h4 mb-0 text-magenta">Privacidad</h2>
                </div>
                <p class="text-secondary">
                    Tus datos son sagrados. No guardamos info de tarjetas; usamos pasarelas de pago cifradas.
                </p>
            </section>

            <section>
                <div class="d-flex align-items-center mb-3">
                    <span class="hansip-font me-3 text-white" style="font-size: 1.5rem;">07.</span>
                    <h2 class="h4 mb-0 text-magenta">Propiedad Intelectual</h2>
                </div>
                <p class="text-secondary">
                    La marca <span class="text-white fw-bold">StanLee Sin</span> y el código de esta web son propiedad de sus desarrolladores. No robes, no seas gil.
                </p>
            </section>

        </div>

        <div class="text-center mt-5">
            <a href="/" class="btn-stanley-legend">
                VOLVER AL HOME
            </a>
        </div>
    </div>
</div>
@endsection
