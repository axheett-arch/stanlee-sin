@extends('layouts.plantilla')

@section('contenido')
    <div class="row align-items-center min-vh-75 py-5">
        <div class="col-lg-6">
            <h1 class="hansip-font" style="font-size: clamp(3rem, 10vw, 5rem); line-height: 1;">
                STANLEE <br> <span style="color: white;">SIN LÍMITES.</span>
            </h1>
            <p class="lead my-4 text-secondary">
                La resistencia de un Stanley con el estilo urbano de Corrientes.
                Mantené tu bebida fría o caliente mientras pateás la calle.
            </p>
            <div class="d-grid gap-3 d-md-flex">
                <a href="/catalogo" class="btn btn-stanley btn-lg px-5">VER CATÁLOGO</a>
                <a href="/contacto" class="btn btn-outline-light btn-lg px-5">CONTACTO</a>
            </div>
        </div>

        <div class="col-lg-6 text-center mt-5 mt-lg-0">
            <div class="position-relative d-inline-block">
                <div class="position-absolute top-50 start-50 translate-middle w-100 h-100"
                     style="background: radial-gradient(circle, rgba(200,13,85,0.3) 0%, transparent 70%); z-index: -1;">
                </div>
                <img src="{{ asset('img/Untitled-4 (1).png') }}" alt="Termo Stanlee Sin" class="img-fluid floating-anim">
            </div>
        </div>
    </div>

    <div class="row mt-5 py-5 border-top border-secondary">
        <div class="col-12 text-center mb-5">
            <h2 class="hansip-font">Nuestra Esencia</h2>
        </div>
        <div class="col-md-4 text-center">
            <h3 class="h5 text-magenta">RESISTENCIA</h3>
            <p class="small text-secondary">Acero inoxidable de alto grado. Bancan cualquier golpe.</p>
        </div>
        <div class="col-md-4 text-center border-start border-end border-secondary">
            <h3 class="h5 text-magenta">ESTILO</h3>
            <p class="small text-secondary">Diseños únicos con la impronta de Axel y Tiago.</p>
        </div>
        <div class="col-md-4 text-center">
            <h3 class="h5 text-magenta">GARANTÍA</h3>
            <p class="small text-secondary">Como dice el nombre: Stanlee Sin fallas.</p>
        </div>
    </div>
@endsection


