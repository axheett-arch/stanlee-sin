
@extends('layouts.plantilla')

@section('contenido')
<div class="py-5">
    <div class="text-center mb-5">
        <h1 class="hansip-font" style="font-size: clamp(2.5rem, 6vw, 4rem);">
            CATALOGO <span class="text-magenta">EQUIPMENT</span>
        </h1>
        <p class="text-secondary hansip-font" style="letter-spacing: 3px; font-size: 0.8rem;">
            SUMINISTROS TACTICOS DISPONIBLES // STOCK ESTATICO
        </p>
    </div>

    <div class="row g-4">

        {{-- SET MAESTRÍA --}}
        <div class="col-12 mb-4">
            <div class="card-esencia p-0 overflow-hidden border-magenta card-glow" style="background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(200,13,85,0.05) 100%);">
                <div class="row g-0 align-items-center">
                    <div class="col-md-4 bg-black text-center p-4">
                        <img src="{{ asset('img/set-maestria.png') }}" class="img-fluid img-catalog" style="max-height: 300px;" alt="Set Maestría">
                    </div>
                    <div class="col-md-8">
                        <div class="p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <span class="text-magenta hansip-font" style="font-size: 0.7rem;">ULTIMATE BUNDLE // SN-MAX</span>
                                    <h3 class="hansip-font h2 text-white mb-0">SET MAESTRÍA <span class="text-magenta">TOTAL</span></h3>
                                </div>
                                <span class="text-magenta h3 hansip-font">$145.000</span>
                            </div>
                            <p class="text-secondary fs-5 mb-4">
                                El arsenal definitivo para el cebador de élite. Incluye Termo Classic 1L, Mate System y Bombilla de alta precisión.
                            </p>
                            <a href="{{ route('en.desarrollo') }}" class="btn btn-stanley-legend px-5 py-3 btn-glitch text-decoration-none d-inline-block">RECLAMAR RECOMPENSA</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- IZANAGI WHITE --}}
        <div class="col-md-4">
            <div class="card-esencia h-100 p-0 overflow-hidden border-magenta">
                <div class="bg-black text-center p-4">
                    <img src="{{ asset('img/izanagi.png') }}" class="img-fluid img-catalog" alt="Izanagi White">
                </div>
                <div class="p-4 border-top border-secondary">
                    <h3 class="hansip-font h5 text-white mb-2">IZANAGI WHITE</h3>
                    <p class="text-secondary small mb-3">Pureza y resistencia extrema. Visión clara en la tormenta.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-magenta fw-bold">$70.000</span>
                        <a href="{{ route('en.desarrollo') }}" class="btn btn-stanley-legend px-3 py-1 btn-glitch text-decoration-none" style="font-size: 0.7rem;">EQUIPAR</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- MONJE CIEGO --}}
        <div class="col-md-4">
            <div class="card-esencia h-100 p-0 overflow-hidden">
                <div class="bg-black text-center p-4">
                    <img src="{{ asset('img/monjeciego.png') }}" class="img-fluid img-catalog" alt="Monje Ciego">
                </div>
                <div class="p-4 border-top border-secondary">
                    <h3 class="hansip-font h5 text-white mb-2">MONJE CIEGO</h3>
                    <p class="text-secondary small mb-3">Resistencia legendaria que no necesita presentación. El pilar de la crew.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-magenta fw-bold">$68.000</span>
                        <a href="{{ route('en.desarrollo') }}" class="btn btn-stanley-legend px-3 py-1 text-decoration-none" style="font-size: 0.7rem;">EQUIPAR</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- TEMPEST DARK --}}
        <div class="col-md-4">
            <div class="card-esencia h-100 p-0 overflow-hidden border-magenta">
                <div class="bg-black text-center p-4">
                    <img src="{{ asset('img/tempest.png') }}" class="img-fluid img-catalog" alt="Tempest Black">
                </div>
                <div class="p-4 border-top border-secondary">
                    <h3 class="hansip-font h5 text-white mb-2">TEMPEST DARK</h3>
                    <p class="text-secondary small mb-3">Forjado en las sombras, diseñado para brillar. El item definitivo del setup.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-magenta fw-bold">$85.000</span>
                        <a href="{{ route('en.desarrollo') }}" class="btn btn-stanley-legend px-3 py-1 btn-glitch text-decoration-none" style="font-size: 0.7rem;">EQUIPAR</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- STORM DRINK --}}
        <div class="col-md-4">
            <div class="card-esencia h-100 p-0 overflow-hidden border-magenta card-glow">
                <div class="bg-black text-center p-4">
                    <img src="{{ asset('img/terere-storm.png') }}" class="img-fluid img-catalog" alt="Tereré Storm">
                </div>
                <div class="p-4 border-top border-secondary bg-dark-gradient">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h3 class="hansip-font h5 text-white mb-0">STORM DRINK</h3>
                        <span class="text-magenta fw-bold">$68.000</span>
                    </div>
                    <p class="text-secondary small mb-3">Unidad térmica de flujo rápido. Incluye bombilla de precisión para el tereré más frío.</p>
                    <a href="{{ route('en.desarrollo') }}" class="btn btn-stanley-legend w-100 py-2 btn-glitch text-decoration-none">EQUIPAR</a>
                </div>
            </div>
        </div>

        {{-- STRIKER CUP --}}
        <div class="col-md-4">
            <div class="card-esencia h-100 p-0 overflow-hidden border-magenta">
                <div class="bg-black text-center p-4">
                    <img src="{{ asset('img/vasostriker.png') }}" class="img-fluid img-catalog" alt="Vaso Striker">
                </div>
                <div class="p-4 border-top border-secondary">
                    <h3 class="hansip-font h5 text-white mb-2">STRIKER CUP</h3>
                    <p class="text-secondary small mb-3">Brindis final. Destapador táctico incluido.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-magenta fw-bold">$70.000</span>
                        <a href="{{ route('en.desarrollo') }}" class="btn btn-stanley-legend px-3 py-1 text-decoration-none" style="font-size: 0.7rem;">EQUIPAR</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- GROWLER BÚNKER --}}
        <div class="col-md-4">
            <div class="card-esencia h-100 p-0 overflow-hidden">
                <div class="bg-black text-center p-4">
                    <img src="{{ asset('img/bunker.png') }}" class="img-fluid img-catalog" alt="Growler Búnker">
                </div>
                <div class="p-4 border-top border-secondary">
                    <h3 class="hansip-font h5 text-white mb-2">GROWLER BÚNKER</h3>
                    <p class="text-secondary small mb-3">El tanque que tu inventario necesita. Resistencia de grado militar.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-magenta fw-bold">$68.000</span>
                        <a href="{{ route('en.desarrollo') }}" class="btn btn-stanley-legend px-3 py-1 text-decoration-none" style="font-size: 0.7rem;">EQUIPAR</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- GHOST WHITE --}}
        <div class="col-md-4">
            <div class="card-esencia h-100 p-0 overflow-hidden border-magenta">
                <div class="bg-black text-center p-4">
                    <img src="{{ asset('img/ghost-white.png') }}" class="img-fluid img-catalog" alt="Ghost White">
                </div>
                <div class="p-4 border-top border-secondary">
                    <h3 class="hansip-font h5 text-white mb-2">GHOST WHITE</h3>
                    <p class="text-secondary small mb-3">Máxima retención térmica. Domina cada partida con energía inagotable.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-magenta fw-bold">$62.000</span>
                        <a href="{{ route('en.desarrollo') }}" class="btn btn-stanley-legend px-3 py-1 btn-glitch text-decoration-none" style="font-size: 0.7rem;">EQUIPAR</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- FIRE DRAGON --}}
        <div class="col-md-4">
            <div class="card-esencia h-100 p-0 overflow-hidden border-magenta card-glow">
                <div class="bg-black text-center p-4">
                    <img src="{{ asset('img/monjeciego.png') }}" class="img-fluid img-catalog" style="filter: hue-rotate(40deg) saturate(1.5);" alt="Fire Dragon">
                </div>
                <div class="p-4 border-top border-secondary bg-dark-gradient">
                    <h3 class="hansip-font h5 text-white mb-2">FIRE DRAGON</h3>
                    <p class="text-secondary small mb-3">Poder de fuego. Temperatura extrema asegurada.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-magenta fw-bold">$62.000</span>
                        <a href="{{ route('en.desarrollo') }}" class="btn btn-stanley-legend px-3 py-1 btn-glitch text-decoration-none" style="font-size: 0.7rem;">EQUIPAR</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- GREEN BUSH --}}
        <div class="col-md-4">
            <div class="card-esencia h-100 p-0 overflow-hidden border-magenta">
                <div class="bg-black text-center p-4">
                    <img src="{{ asset('img/bush.png') }}" class="img-fluid img-catalog" alt="Bush Green">
                </div>
                <div class="p-4 border-top border-secondary">
                    <h3 class="hansip-font h5 text-white mb-2">GREEN BUSH</h3>
                    <p class="text-secondary small mb-3">Con el sigilo de la jungla. El verde de la resistencia.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-magenta fw-bold">$135.000</span>
                        <a href="{{ route('en.desarrollo') }}" class="btn btn-stanley-legend px-3 py-1 text-decoration-none" style="font-size: 0.7rem;">EQUIPAR</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="mt-5 text-center p-4 border border-secondary dashed-border">
        <p class="text-secondary small mb-0">
            <span class="text-magenta fw-bold">// AVISO:</span> PRODUCTOS VISUALIZADOS DE MANERA ESTÁTICA SEGÚN REQUERIMIENTO DEL PROYECTO 2026.
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
