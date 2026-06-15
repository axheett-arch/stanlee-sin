@extends('layouts.plantilla')

@section('contenido')
    <div class="py-5">
        <div class="row align-items-center mb-5 pb-5">
            <div class="col-lg-7">
                <h1 class="hansip-font mb-4" style="font-size: clamp(2.5rem, 6vw, 4rem);">
                    NUESTRA <span class="text-magenta">HISTORIA</span>
                </h1>
                <p class="fs-5 text-secondary fw-light" style="line-height: 1.6;">
                    <span class="text-white fw-bold">StanLee Sin </span> no nació en una corporación tradicional; se
                    originó
                    en
                    las
                    aulas de la Licenciatura en Sistemas como un proyecto de Taller de Programación I. Nuestra
                    propuesta
                    surge con un objetivo claro: fusionar el rendimiento y la durabilidad de los productos
                    Stanley
                    con
                    la identidad estética de la cultura urbana.
                </p>
                <div class="p-3 border-start border-magenta bg-black my-4">
                    <p class="text-white mb-0 italic">
                        "El nombre nace bajo la influencia de un personaje del videojuego League of Legends (Lee Sin), el
                        cual se
                        caracteriza por su resistencia y durabilidad, justamente lo que queremos transmitir en la calidad de
                        nuestros productos"
                    </p>
                </div>
                <p class="fs-5 text-secondary fw-light">
                    Nuestro objetivo es que tu herramienta diaria sea tan dura como el acero y tan única como tu propio
                    estilo en la calle.
                </p>
            </div>

            <div class="col-lg-5 text-center mt-5 mt-lg-0">
                <div class="position-relative d-inline-block">
                    <div class="position-absolute top-50 start-50 translate-middle w-100 h-100"
                        style="background: radial-gradient(circle, rgba(200,13,85,0.4) 0%, transparent 70%);
                            z-index: -1; filter: blur(30px); transform: scale(1.3);">
                    </div>

                    <div
                        style="border: 2px solid var(--magenta-stanley); padding: 10px; background: #000; box-shadow: 15px 15px 0px rgba(200,13,85,0.1);">
                        <img src="{{ asset('img/leesin.png') }}" alt="Lee Sin Concept" class="img-fluid floating-anim"
                            style="max-height: 400px; filter: grayscale(0.2) contrast(1.1);">
                    </div>

                    <span class="position-absolute bottom-0 end-0 bg-magenta text-white hansip-font px-3 py-2"
                        style="font-size: 0.8rem; transform: rotate(-3deg) translate(20px, 20px); box-shadow: 5px 5px 0px #000;">
                        Lee Sin
                    </span>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-5 border-top border-secondary">
            <div class="col-12 text-center mb-5">
                <h2 class="hansip-font" style="font-size: 3rem;">EL <span class="text-magenta">STAFF</span></h2>
                <p class="text-secondary hansip-font" style="letter-spacing: 2px; font-size: 0.8rem;">LOS ARQUITECTOS DETRAS
                    DEL PROYECTO</p>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card-esencia p-4 h-100 text-center border-magenta">
                    <div class="mb-4">
                        <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center"
                            style="width: 100px; height: 100px; background: var(--magenta-stanley); color: white; font-family: 'HansipCustom'; font-size: 2.5rem; box-shadow: 0 0 20px rgba(200,13,85,0.4);">
                            A
                        </div>
                    </div>
                    <h3 class="hansip-font text-white h4 mb-1">Axel Joel Gomez</h3>
                    <p class="text-magenta fw-bold small mb-3">FUNDADOR & DIRECTOR CREATIVO</p>
                    <p class="text-secondary small px-3">
                        Estudiante de Licenciatura en Sistemas. Especialista en flow visual y dirección artística. Su visión
                        garantiza que cada producto de StanLee Sin tenga alma desde un enfoque creativo.
                    </p>
                    <div class="mt-3 pt-3 border-top border-secondary">
                        <span class="text-white small hansip-font" style="font-size: 0.6rem; opacity: 0.5;"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card-esencia p-4 h-100 text-center">
                    <div class="mb-4">
                        <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center"
                            style="width: 100px; height: 100px; background: white; color: var(--magenta-stanley); font-family: 'HansipCustom'; font-size: 2.5rem; box-shadow: 0 0 20px rgba(255,255,255,0.1);">
                            T
                        </div>
                    </div>
                    <h3 class="hansip-font text-white h4 mb-1">Tiago Tomasella</h3>
                    <p class="text-magenta fw-bold small mb-3">FUNDADOR & DESARROLLADOR</p>
                    <p class="text-secondary small px-3">
                        Estudiante de Licenciatura en Sistemas. Arquitecto de soluciones y lógica de sistemas. Se encarga de
                        que la robustez de la marca se traduzca en una experiencia digital perfecta.
                    </p>
                    <div class="mt-3 pt-3 border-top border-secondary">
                        <span class="text-white small hansip-font" style="font-size: 0.6rem; opacity: 0.5;"></span>
                    </div>
                </div>
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
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d221.2309934097466!2d-58.78619053965798!3d-27.47872537538974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b0107b2873b%3A0xe53f03eb498e172c!2sDescartes%201184%2C%20W3402%20Corrientes!5e0!3m2!1ses-419!2sar!4v1781541548336!5m2!1ses-419!2sar"
                    width="100%" height="400" style="border:0; filter: grayscale(100%) invert(92%) contrast(90%);"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
@endsection
