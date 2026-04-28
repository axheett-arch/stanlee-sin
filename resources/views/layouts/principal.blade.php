@extends('layouts.plantilla')

@section('contenido')
    {{-- 1. HERO SECTION --}}
    <div class="row align-items-center min-vh-100 py-5 m-0">
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

    {{-- 2. PANEL DE CARACTERÍSTICAS --}}
    <div class="row mt-5 py-5 border-top border-secondary position-relative m-0">
        <div class="col-12 text-center mb-5">
            <p class="text-secondary hansip-font mb-1" style="font-size: 0.8rem; letter-spacing: 3px;">CARACTERÍSTICAS PRINCIPALES</p>
            <h2 class="hansip-font" style="color: #c80d55; font-size: clamp(2rem, 5vw, 3rem);">¿POR QUÉ ELEGIRNOS?</h2>
        </div>

       <div class="col-md-3 col-sm-6 mb-4">
            <div class="card-tactica h-100 p-4">
                {{-- Imagen del termo martillado --}}
                <div class="img-container-cyber mb-4">
                    <img src="{{ asset('img/sistema-resistente.png') }}" alt="Sistema Resistente" class="img-fluid">
                </div>
                <h4 class="hansip-font text-white h5 mb-3">SISTEMA RESISTENTE</h4>
                <p class="text-secondary small mb-0">Acero inoxidable de alto grado. Bancan cualquier golpe en el mosh o en la calle.</p>
            </div>
        </div>

        {{-- Tarjeta de SOPORTE 24/7 --}}
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card-tactica h-100 p-4">
                {{-- Imagen del soporte técnico ciberpunk --}}
                <div class="img-container-cyber mb-4">
                    <img src="{{ asset('img/soporte-247.png') }}" alt="Soporte 24/7" class="img-fluid">
                </div>
                <h4 class="hansip-font text-white h5 mb-3">SOPORTE 24/7</h4>
                <p class="text-secondary small mb-0">Nuestro equipo está disponible para ayudarte con cualquier consulta técnica.</p>
            </div>
        </div>

        {{-- 3. MÚLTIPLES PAGOS --}}
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card-tactica h-100 p-4">
                <div class="img-container-cyber mb-4">
                    <img src="{{ asset('img/multiples-pagos.png') }}" alt="Múltiples Pagos" class="img-fluid">
                </div>
                <h4 class="hansip-font text-white h5 mb-3">MÚLTIPLES PAGOS</h4>
                <p class="text-secondary small mb-0">Aceptamos diversos métodos de pago para tu comodidad y seguridad.</p>
            </div>
        </div>

       {{-- 4. COMUNIDAD ACTIVA --}}
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card-tactica h-100 p-4">
                {{-- Imagen del brindis de la crew --}}
                <div class="img-container-cyber mb-4">
                    <img src="{{ asset('img/comunidad-activa.png') }}" alt="Comunidad Activa" class="img-fluid">
                </div>
                <h4 class="hansip-font text-white h5 mb-3">COMUNIDAD ACTIVA</h4>
                <p class="text-secondary small mb-0">Únete a nuestra crew de jugadores y artistas urbanos en todo el país.</p>
            </div>
        </div>

    {{-- 3. SECCIÓN MAPA --}}
    <div class="row bg-black pt-5 m-0">
        <div class="col-12 text-center">
            <h3 class="hansip-font mb-4" style="letter-spacing: 2px;">
                <span class="text-white">PUEDES</span>
                <span class="text-magenta" style="color: #c80d55;">ENCONTRARNOS</span>
                <span class="text-white">AQUÍ</span>
            </h3>
        </div>
    </div>

    <div class="row p-0 border-top border-bottom border-magenta m-0" style="border-color: #c80d55 !important;">
        <div class="col-12 p-0">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113264.44498357778!2d-58.834433!3d-27.469213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b79d5bed361%3A0xf6369c79f984d76d!2sCorrientes!5e0!3m2!1ses-419!2sar!4v1714488000000!5m2!1ses-419!2sar"
                width="100%" height="400" style="border:0; filter: grayscale(100%) invert(92%) contrast(90%);"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>

   <style>
    /* 1. Fondo Negro Puro para todo el sitio */
    /* Esto hace que el borde fucsia explote visualmente */
    body {
        background-color: #000000 !important;
        color: #ffffff;
    }

    /* 2. Unificación de los Títulos Trapezoidales */
    /* Aseguramos que '¿POR QUÉ ELEGIRNOS?' tenga la misma fuente y estilo */
    .hansip-font {
        font-family: 'Hansip', sans-serif; /* Asegurate de que la fuente esté cargada */
    }

    /* 3. Estilo de las Tarjetas Tácticas */
    /* Ajustamos el fondo de las cards para que sean negras profundas y se note el hover */
    .card-tactica {
        background: #000000 !important;
        border: 1px solid #1a1a1a;
        border-radius: 15px;
        transition: all 0.3s ease-in-out;
        text-align: left;
        position: relative;
        overflow: hidden;
    }

    /* 4. El Efecto Glow Táctico (Hover) */
    /* Al pasar el mouse, la tarjeta brilla y sube sutilmente */
    .card-tactica:hover {
        border-color: #c80d55 !important;
        transform: translateY(-8px);
        box-shadow: 0 10px 30px rgba(200, 13, 85, 0.3);
    }

    /* 5. Estilo de los Íconos (Si usás Bootstrap Icons) */
    /* Les damos el contenedor oscuro y el color magenta */
    .icon-box-cyber {
        width: 60px;
        height: 60px;
        background: #0a0a0a;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        color: #c80d55;
        font-size: 1.8rem;
        border: 1px solid #222;
        transition: all 0.3s ease;
    }

    /* El ícono se ilumina en hover */
    .card-tactica:hover .icon-box-cyber {
        background: #c80d55;
        color: white;
        box-shadow: 0 0 15px rgba(200, 13, 85, 0.8);
    }

    /* Estilo para que la imagen se vea épica en la card */
    .img-container-cyber {
        width: 100%;
        height: 180px; /* Ajustá la altura según cómo quieras que se vea */
        overflow: hidden;
        border-radius: 12px;
        background: #000;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #1a1a1a;
        transition: all 0.3s ease;
    }

    .img-container-cyber img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Esto hace que la imagen cubra el área sin deformarse */
        filter: grayscale(20%); /* Un toque de gris para que el neón resalte más */
        transition: all 0.3s ease;
    }

    /* Efecto cuando pasas el mouse por la tarjeta */
    .card-tactica:hover .img-container-cyber {
        border-color: #c80d55;
        box-shadow: 0 0 20px rgba(200, 13, 85, 0.4);
    }

    .card-tactica:hover .img-container-cyber img {
        filter: grayscale(0%);
        transform: scale(1.05); /* Efecto de zoom sutil */
    }
</style>
@endsection
