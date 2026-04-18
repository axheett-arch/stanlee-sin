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
                                <span class="text-white">Probado en las condiciones más extremas de la Grieta y la Facultad.</span>
                            </p>
                            <div class="d-flex gap-3 mb-4">
                                <div class="badge-tech px-3 py-2">TECNOLOGÍA DE VACÍO</div>
                                <div class="badge-tech px-3 py-2">ACERO 18/8</div>
                                <div class="badge-tech px-3 py-2">GRABADO CUSTOM</div>
                            </div>
                            <button class="btn-stanley-legend px-5 py-3 btn-glitch">RECLAMAR RECOMPENSA</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-esencia h-100 p-0 overflow-hidden border-magenta card-glow">
                <div class="product-header px-3 py-2 d-flex justify-content-between align-items-center">
                    <span class="text-magenta small hansip-font">SN-001 // SPECIAL</span>
                    <span class="badge rounded-pill bg-magenta" style="font-size: 0.5rem;">TOP_TIER</span>
                </div>
                <div class="bg-black text-center p-4">
                    <img src="{{ asset('img/izanagi.png') }}" class="img-fluid img-catalog" alt="Izanagi White">
                </div>
                <div class="p-4 border-top border-secondary bg-dark-gradient">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h3 class="hansip-font h5 text-white mb-0">IZANAGI WHITE</h3>
                        <span class="text-magenta fw-bold">$89.000</span>
                    </div>
                    <p class="text-secondary small mb-3">Pureza y resistencia. Una armadura de acero blanco diseñada para los que ven más allá de las sombras.</p>
                    <div class="d-flex gap-2 mb-4">
                        <span class="badge-tech">HOT: 28H</span>
                        <span class="badge-tech">COLD: 30H</span>
                    </div>
                    <button class="btn-stanley-legend w-100 py-2 btn-glitch">ORDENAR EQUIPO</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-esencia h-100 p-0 overflow-hidden">
                <div class="product-header px-3 py-2 d-flex justify-content-between align-items-center">
                    <span class="text-secondary small hansip-font">SN-002 // CLASSIC</span>
                </div>
                <div class="bg-black text-center p-4">
                    <img src="{{ asset('img/monjeciego.png') }}" class="img-fluid img-catalog" alt="Monje Ciego">
                </div>
                <div class="p-4 border-top border-secondary">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h3 class="hansip-font h5 text-white mb-0">MONJE CIEGO</h3>
                        <span class="text-magenta fw-bold">$85.000</span>
                    </div>
                    <p class="text-secondary small mb-3">El estándar de la crew. Rojo vibrante para que tu equipo nunca pase desapercibido en el búnker.</p>
                    <div class="d-flex gap-2 mb-4">
                        <span class="badge-tech">HOT: 24H</span>
                        <span class="badge-tech">COLD: 24H</span>
                    </div>
                    <button class="btn-stanley-legend w-100 py-2">ORDENAR EQUIPO</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-esencia h-100 p-0 overflow-hidden border-magenta card-glow">
                <div class="product-header px-3 py-2 d-flex justify-content-between align-items-center">
                    <span class="text-magenta small hansip-font">SN-003 // LIMITED</span>
                    <span class="badge rounded-pill bg-magenta" style="font-size: 0.5rem;">DROP_01</span>
                </div>
                <div class="bg-black text-center p-4">
                    <img src="{{ asset('img/tempest.png') }}" class="img-fluid img-catalog" alt="Tempest Black">
                </div>
                <div class="p-4 border-top border-secondary bg-dark-gradient">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h3 class="hansip-font h5 text-white mb-0">TEMPEST DARK</h3>
                        <span class="text-magenta fw-bold">$95.000</span>
                    </div>
                    <p class="text-secondary small mb-3">Grabado láser industrial con motivos florales. El equilibrio perfecto entre la fuerza y la estética urbana.</p>
                    <div class="d-flex gap-2 mb-4">
                        <span class="badge-tech">COLD: 12H</span>
                        <span class="badge-tech">ICE: 2D</span>
                    </div>
                    <button class="btn-stanley-legend w-100 py-2 btn-glitch">ORDENAR EQUIPO</button>
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
    /* Efecto de Brillo para los destacados */
    .card-glow {
        box-shadow: 0 0 20px rgba(200, 13, 85, 0.1);
    }

    .img-catalog {
        max-height: 250px;
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .card-esencia:hover .img-catalog {
        transform: scale(1.1) rotate(2deg);
    }

    /* Badge estilo tech */
    .badge-tech {
        background-color: #111;
        color: #777;
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 4px 8px;
        font-size: 0.6rem;
        font-family: 'HansipCustom', sans-serif;
        letter-spacing: 1px;
    }

    .bg-dark-gradient {
        background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(200,13,85,0.05) 100%);
    }

    .bg-magenta {
        background-color: var(--magenta-stanley);
    }

    .dashed-border {
        border-style: dashed !important;
    }

    /* Botón con efecto sutil */
    .btn-glitch:hover {
        box-shadow: 2px 2px 0px #fff;
        transform: translate(-2px, -2px);
    }
</style>
@endsection
