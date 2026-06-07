
@extends('layouts.plantilla')

@section('contenido')
<div class="py-5">
    <div class="text-center mb-5">
        <h1 class="hansip-font" style="font-size: clamp(2.5rem, 6vw, 4rem);">
            CATALOGO <span class="text-magenta">EQUIPMENT</span>
        </h1>
        <p class="text-secondary hansip-font" style="letter-spacing: 3px; font-size: 0.8rem;">
            SUMINISTROS TACTICOS DISPONIBLES // STOCK DINÁMICO
        </p>
    </div>

    <div class="row g-4">

        {{-- CARD DESTACADA (SET MAESTRÍA) --}}
        @if(isset($destacado))
        <div class="col-12 mb-4">
            <div class="card-esencia p-0 overflow-hidden border-magenta {{ $destacado['glow'] ? 'card-glow' : '' }}" style="background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(200,13,85,0.05) 100%);">
                <div class="row g-0 align-items-center">
                    <div class="col-md-4 bg-black text-center p-4">
                        <img src="{{ asset('img/' . $destacado['imagen']) }}" class="img-fluid img-catalog" style="max-height: 300px;" alt="{{ $destacado['nombre'] }}">
                    </div>
                    <div class="col-md-8">
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <span class="text-magenta hansip-font" style="font-size: 0.7rem;">{{ $destacado['subtitulo'] }}</span>
                                    <h3 class="hansip-font h2 text-white mb-0">{{ $destacado['nombre'] }}</h3>
                                </div>
                                <span class="text-magenta h3 hansip-font">{{ $destacado['precio'] }}</span>
                            </div>
                            <p class="text-secondary fs-5 mb-4">{{ $destacado['descripcion'] }}</p>
                            <a href="{{ route('en.desarrollo') }}" class="btn btn-stanley-legend px-5 py-3 btn-glitch text-decoration-none d-inline-block">RECLAMAR RECOMPENSA</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        {{-- BUCLE DE PRODUCTOS GENERALES --}}
        @foreach($productos as $prod)
        <div class="col-md-4">
            <div class="card-esencia h-100 p-0 overflow-hidden border-magenta {{ $prod['glow'] ? 'card-glow' : '' }}">
                <div class="bg-black text-center p-4">
                    <img src="{{ asset('img/' . $prod['imagen']) }}" class="img-fluid img-catalog" style="{{ $prod['filter'] ?? '' }}" alt="{{ $prod['nombre'] }}">
                </div>
                <div class="p-4 border-top border-secondary {{ $prod['style'] }}">

                    @if($prod['style'] === 'bg-dark-gradient') {{-- Estilo especial para Storm Drink --}}
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h3 class="hansip-font h5 text-white mb-0">{{ $prod['nombre'] }}</h3>
                            <span class="text-magenta fw-bold">{{ $prod['precio'] }}</span>
                        </div>
                    @else {{-- Estilo por defecto --}}
                        <h3 class="hansip-font h5 text-white mb-2">{{ $prod['nombre'] }}</h3>
                    @endif

                    <p class="text-secondary small mb-3">{{ $prod['descripcion'] }}</p>

                    <div class="d-flex justify-content-between align-items-center">
                        @if($prod['style'] !== 'bg-dark-gradient')
                            <span class="text-magenta fw-bold">{{ $prod['precio'] }}</span>
                        @endif
                        <a href="{{ route('en.desarrollo') }}" class="btn btn-stanley-legend {{ $prod['style'] === 'bg-dark-gradient' ? 'w-100' : 'px-3' }} py-1 btn-glitch text-decoration-none" style="font-size: 0.7rem;">EQUIPAR</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <div class="grid-footer mt-5 text-center p-4 border border-secondary dashed-border">
        <p class="text-secondary small mb-0">
            <span class="text-magenta fw-bold">// AVISO:</span> PRODUCTOS VISUALIZADOS DE MANERA DINÁMICA SEGÚN REQUERIMIENTO DEL PROYECTO 2026.
        </p>
    </div>
</div>

<style>
    .img-catalog {
        width: 100%;
        max-width: 180px;
        height: 220px;
        object-fit: contain;
        transition: transform 0.4s ease;
        display: block;
        margin: 0 auto;
    }
    .card-glow { box-shadow: 0 0 20px rgba(200, 13, 85, 0.2); }
    .card-esencia:hover .img-catalog { transform: scale(1.1) rotate(2deg); }
    .bg-dark-gradient { background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(200,13,85,0.05) 100%); }
    .dashed-border { border-style: dashed !important; }
    .btn-stanley-legend {
        display: inline-block;
        text-align: center;
        text-decoration: none !important;
    }
    .btn-glitch:hover {
        box-shadow: 2px 2px 0px #fff;
        transform: translate(-2px, -2px);
    }
</style>
@endsection
