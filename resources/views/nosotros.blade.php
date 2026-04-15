@extends('layouts.plantilla')

@section('contenido')
    <div class="row py-5 align-items-center">
        <div class="col-lg-6">
            <h1 class="hansip-font mb-4" style="font-size: 3.5rem;">NUESTRA <span class="text-magenta">HISTORIA</span></h1>
            <p class="fs-5 text-secondary fw-light" style="line-height: 1.6;">
                <span class="text-white fw-bold">StanLee Sin</span> no nació en una oficina, nació en las clases de Taller de Programación I.
                El nombre de la marca hace referencia a un juego de palabras entre la marca "Stanley" (productos que comercializamos) y el personaje de League of Legends "Lee sin".
                Surgió de la necesidad de combinar la resistencia legendaria de un Stanley con el estilo visual de la cultura urbana.
            </p>
            <p class="fs-5 text-secondary fw-light">
                Nuestro objetivo es simple: Que tu equipo de mate o tereré no sea solo una herramienta, sino una declaración de principios.
                Queremos que cada pieza que salga de nuestro taller sea tan dura como el acero y tan única como una pentakill.
            </p>
        </div>
        <div class="col-lg-6 text-center mt-4 mt-lg-0">
           <img src="{{ asset('img/leesin.png') }}"
                class="img-fluid border-magenta p-2"
                style="max-height: 350px; border: 2px solid #c80d55;"
                alt="Esencia StanLee Sin">
        </div>
    </div>

    <div class="row mt-5 pt-5 border-top border-secondary">
        <div class="col-12 text-center mb-5">
            <h2 class="hansip-font" style="font-size: 3rem;">EL <span class="text-magenta">EQUIPO</span></h2>
            <p class="text-secondary">Los responsables detrás del diseño y el código.</p>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card bg-black border-secondary p-4 h-100 text-center">
                <div class="mb-3">
                    <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center"
                         style="width: 120px; height: 120px; background: #c80d55; color: white; font-family: 'HansipCustom'; font-size: 2rem;">
                        A
                    </div>
                </div>
                <h3 class="hansip-font text-white h4">Axel Joel Gomez</h3>
                <p class="text-magenta fw-bold">Founder & Creative Director</p>
                <p class="text-secondary small">Estudiante de Licenciatura en Sistemas. Encargado de darle el flow visual y la dirección artística a cada diseño de StanLee Sin.</p>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card bg-black border-secondary p-4 h-100 text-center">
                <div class="mb-3">
                    <div class="rounded-circle mx-auto d-flex align-items-center justify-content-center"
                         style="width: 120px; height: 120px; background: white; color: #c80d55; font-family: 'HansipCustom'; font-size: 2rem;">
                        T
                    </div>
                </div>
                <h3 class="hansip-font text-white h4">Tiago Tomasella</h3>
                <p class="text-magenta fw-bold">Founder & Lead Dev</p>
                <p class="text-secondary small">Estudiante de Licenciatura en Sistemas. Responsable de la arquitectura y de que la resistencia de la marca se traslade a la experiencia del cliente.</p>
            </div>
        </div>
    </div>
@endsection
