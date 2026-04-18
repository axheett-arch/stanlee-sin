@extends('layouts.plantilla')

@section('contenido')
<div class="py-5">
    <h1 class="hansip-font text-center mb-5" style="font-size: clamp(2.5rem, 6vw, 4rem);">
        CONTACTA A <span class="text-magenta">LA CREW</span>
    </h1>

    <div class="row g-5">
        <div class="col-md-5">
            <div class="card-esencia p-4 h-100">
                <h3 class="hansip-font h4 mb-4 text-white">OPERACIONES</h3>

                <div class="mb-4">
                    <p class="text-magenta hansip-font mb-1" style="font-size: 0.8rem; letter-spacing: 1px;">UBICACIÓN</p>
                    <p class="text-secondary">Corrientes Capital, Argentina.<br>Búnker de zona norte.</p>
                </div>

                <div class="mb-4">
                    <p class="text-magenta hansip-font mb-1" style="font-size: 0.8rem; letter-spacing: 1px;">WHATSAPP</p>
                    <p class="text-secondary">+54 379 400-0000</p>
                </div>

                <div class="mb-4">
                    <p class="text-magenta hansip-font mb-1" style="font-size: 0.8rem; letter-spacing: 1px;">EMAIL</p>
                    <p class="text-secondary">crew@stanlee-sin.test</p>
                </div>

                <div class="mt-5 p-3 border-start border-magenta bg-black">
                    <p class="small text-white italic mb-0">"El dominio de uno mismo es el primer paso hacia la maestría."</p>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card-esencia p-4">
                <form action="#" method="POST">
                    <div class="mb-4">
                        <label class="label-stanley mb-2">NOMBRE / A.K.A</label>
                        <input type="text" class="form-control input-stanley" placeholder="¿Cómo te llamamos?">
                    </div>

                    <div class="mb-4">
                        <label class="label-stanley mb-2">EMAIL DE CONTACTO</label>
                        <input type="email" class="form-control input-stanley" placeholder="tu@email.com">
                    </div>

                    <div class="mb-4">
                        <label class="label-stanley mb-2">MOTIVO DE LA MISIÓN</label>
                        <select class="form-control input-stanley">
                            <option>Consulta General</option>
                            <option>Pedido Personalizado</option>
                            <option>Problema Técnico (Garantía)</option>
                            <option>Propuesta de Colaboración</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="label-stanley mb-2">MENSAJE</label>
                        <textarea class="form-control input-stanley" rows="4" placeholder="Escribí acá tu duda o propuesta..."></textarea>
                    </div>

                    <form action="" method="GET">
                        <button type="submit" class="btn-stanley-legend w-100">
                            ENVIAR MENSAJE
                         </button>
                    </form>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
