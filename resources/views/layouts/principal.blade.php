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
                <br>
                <span class="text-white fw-bold">StanLee Sin</span>: Mantené el calor mientras pateás la calle.
            </p>

            <div class="mt-5">
                <a href="/catalogo" class="btn-stanley-legend">EXPLORAR EL BARRIO</a>
            </div>
        </div>

        <div class="col-lg-5 text-center mt-5 mt-lg-0">
            <div class="position-relative d-inline-block">
                <div class="position-absolute top-50 start-50 translate-middle w-100 h-100"
                     style="background: radial-gradient(circle, rgba(200,13,85,0.4) 0%, transparent 70%); z-index: -1;">
                </div>

                <img src="{{ asset('img/termox.png') }}"
                     alt="Termo Stanlee Sin"
                     class="img-fluid floating-anim termo-legendario"
                     style="max-height: 550px;">
            </div>
        </div>
    </div>

    <div class="row mt-5 py-5 border-top border-secondary text-center">
        <div class="col-12 mb-5">
            <h2 class="hansip-font" style="color: #c80d55; font-size: 3rem;">NUESTRA ESENCIA</h2>
        </div>

        <div class="col-md-4 px-4">
            <h3 class="hansip-font h4 text-white mb-3">RESISTENCIA</h3>
            <p class="text-secondary">Acero inoxidable de alto grado. Bancan cualquier golpe en el mosh o en la calle. </p>
        </div>

        <div class="col-md-4 px-4 border-start border-end border-secondary">
            <h3 class="hansip-font h4 text-white mb-3">ESTILO</h3>
            <p class="text-secondary">Diseños únicos con la impronta de <span class="text-magenta">Axel y Tiago</span>. </p>
        </div>

        <div class="col-md-4 px-4">
            <h3 class="hansip-font h4 text-white mb-3">GARANTÍA</h3>
            <p class="text-secondary">Como dice el nombre: <span class="text-white fw-bold">StanLee Sin</span> fallas. Dura toda la vida. </p>
        </div>
    </div>
@endsection

