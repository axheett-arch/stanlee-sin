@extends('layouts.plantilla')

@section('contenido')
    <div class="row align-items-center min-vh-100 py-5">
        <div class="col-lg-7">
            <h1 class="hansip-font" style="font-size: clamp(3.5rem, 8vw, 6rem); line-height: 0.9;">
                ESTILO <br>
                <span style="color: #c80d55; text-shadow: 4px 4px 0px #000;">URBANO.</span>
            </h1>

            <p class="mt-4 fs-4 text-secondary fw-light" style="max-width: 550px;">
                La resistencia de un Stanley con el flow de Corrientes.
                <span class="text-white fw-bold">StanLee Sin</span>: Mantené el calor mientras pateás la calle.
            </p>

            <div class="mt-5">
                <a href="/catalogo" class="btn-stanley-legend">
                    EXPLORAR EL BARRIO
                </a>
            </div>
        </div>

        <div class="col-lg-5 text-center mt-5 mt-lg-0">
            <div class="position-relative d-inline-block">
                <div class="position-absolute top-50 start-50 translate-middle w-100 h-100"
                    style="background: radial-gradient(circle, rgba(200,13,85,0.4) 0%, transparent 70%); z-index: -1;">
                </div>

                <img src="{{ asset('img/stanlee_sin_2.png') }}" alt="Termo Stanlee Sin"
                    class="img-fluid floating-anim termo-legendario" style="max-height: 550px;">
            </div>
        </div>
    </div>

    <div class="row mt-5 py-5 border-top border-secondary">
        <div class="col-12 text-center mb-5">
            <h2 class="hansip-font" style="color: #c80d55; font-size: 3rem;">NUESTRA ESENCIA</h2>
        </div>

        <div class="col-md-4 text-center px-4">
            <h3 class="hansip-font h4 text-white mb-3">RESISTENCIA</h3>
            <p class="text-secondary">Acero inoxidable de alto grado. Bancan cualquier golpe en el mosh o en la calle.</p>
        </div>

        <div class="col-md-4 text-center px-4 border-start border-end border-secondary">
            <h3 class="hansip-font h4 text-white mb-3">ESTILO</h3>
            <p class="text-secondary">Diseños únicos con la impronta de <span class="text-magenta">Axel y Tiago</span>.</p>
        </div>

        <div class="col-md-4 text-center px-4">
            <h3 class="hansip-font h4 text-white mb-3">GARANTÍA</h3>
            <p class="text-secondary">Como dice el nombre: <span class="text-white fw-bold">StanLee Sin</span> fallas. Dura
                toda la vida.</p>
        </div>
    </div>

    <div class="container-fluid bg-black pt-5">
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <h3 class="hansip-font mb-4" style="letter-spacing: 2px;">
                    <span class="text-white">PUEDES</span>
                    <span class="text-magenta" style="color: #c80d55;">ENCONTRARNOS</span>
                    <span class="text-white">AQUÍ</span>
                </h3>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0 border-top border-bottom border-magenta" style="border-color: #c80d55 !important;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d429.74461426887467!2d-58.802120662675534!3d-27.50980603005496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sar!4v1777340003276!5m2!1ses-419!2sar"
            width="100%" height="400" style="border:0; filter: grayscale(100%) invert(92%) contrast(90%);"
            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
@endsection
