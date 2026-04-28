@extends('layouts.plantilla')

@section('contenido')
<div class="py-5">
    <h1 class="hansip-font text-center mb-5" style="font-size: clamp(2.5rem, 6vw, 4rem);">
        CONTACTA A <span class="text-magenta">LA CREW</span>
    </h1>

    <div class="row g-5">
        {{-- COLUMNA DE DATOS --}}
        <div class="col-md-5">
            <div class="card-esencia p-4 h-100 border-magenta">
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

        {{-- COLUMNA DEL FORMULARIO --}}
        <div class="col-md-7">
            <div class="card-esencia p-4 border-magenta">
                {{-- Apuntamos a la ruta de éxito que creamos antes --}}
                <form action="{{ route('contacto.enviado') }}" method="GET">
                    <div class="mb-4">
                        <label class="label-stanley mb-2 text-white hansip-font" style="font-size: 0.7rem;">NOMBRE / A.K.A</label>
                        <input type="text" class="form-control input-stanley bg-black text-white border-secondary" placeholder="¿Cómo te llamamos?" required>
                    </div>

                    <div class="mb-4">
                        <label class="label-stanley mb-2 text-white hansip-font" style="font-size: 0.7rem;">EMAIL DE CONTACTO</label>
                        <input type="email" class="form-control input-stanley bg-black text-white border-secondary" placeholder="tu@email.com" required>
                    </div>

                    <div class="mb-4">
                        <label class="label-stanley mb-2 text-white hansip-font" style="font-size: 0.7rem;">MOTIVO DE LA MISIÓN</label>
                        <select class="form-control input-stanley bg-black text-white border-secondary">
                            <option>Consulta General</option>
                            <option>Pedido Personalizado</option>
                            <option>Problema Técnico (Garantía)</option>
                            <option>Propuesta de Colaboración</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="label-stanley mb-2 text-white hansip-font" style="font-size: 0.7rem;">MENSAJE</label>
                        <textarea class="form-control input-stanley bg-black text-white border-secondary" rows="4" placeholder="Escribí acá tu duda o propuesta..." required></textarea>
                    </div>

                    <button type="submit" class="btn-stanley-legend w-100 py-3 btn-glitch">
                        ENVIAR MENSAJE
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .input-stanley:focus {
        background-color: #111 !important;
        border-color: #ff0066 !important;
        color: white !important;
        box-shadow: 0 0 10px rgba(255, 0, 102, 0.2);
    }
    .card-esencia {
        background: rgba(0,0,0,0.8);
        border: 1px solid #333;
    }
    .border-magenta { border: 1px solid #ff0066 !important; }
</style>
@endsection
