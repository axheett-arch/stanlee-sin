@extends('layouts.plantilla')

@section('contenido')
<div class="py-5 text-white">
    <div class="text-center mb-5">
        <h1 class="hansip-font" style="font-size: clamp(2rem, 5vw, 3.5rem);">
            HISTORIAL DE <span class="text-magenta">OPERACIONES</span>
        </h1>
        <p class="text-secondary hansip-font" style="letter-spacing: 2px; font-size: 0.8rem;">
            REGISTRO ETERNO DE SUMINISTROS ADQUIRIDOS // PROTOCOLO DE AUDITORÍA
        </p>
    </div>

    @if($misCompras->count() > 0)
        <div class="row g-4 justify-content-center">
            <div class="col-md-10">
                <div class="card-esencia p-4 border-magenta bg-black card-glow">
                    <div class="table-responsive">
                        <table class="table table-dark align-middle mb-0 text-white" style="--bs-table-bg: transparent;">
                            <thead>
                                <tr class="text-magenta hansip-font small" style="border-bottom: 2px solid #c80d55;">
                                    <th>ID / FECHA</th>
                                    <th>SUMINISTROS EQUIPADOS</th>
                                    <th class="text-end">TOTAL DEBITADO</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($misCompras as $compra)
                                    <tr class="border-bottom border-secondary">
                                        {{-- Columna ID y Fecha --}}
                                        <td class="font-monospace py-4" style="width: 25%;">
                                            <span class="text-white fw-bold">#{{ $compra->id }}</span>
                                            <div class="text-secondary small mt-1">{{ $compra->created_at->format('d/m/Y - H:i') }} hs</div>

                                            {{-- ENLACE TÁCTICO A LA FACTURA --}}
                                            <a href="{{ route('compras.factura', $compra->id) }}" class="btn p-0 border-0 text-magenta mt-2 d-inline-block font-monospace small text-decoration-none" style="font-size: 0.75rem;">
                                                <i class="ti ti-file-text"></i> VER COMPROBANTE
                                            </a>
                                        </td>

                                        {{-- Columna con el desglose específico de productos --}}
                                        <td class="py-3" style="width: 50%;">
                                            <div class="d-flex flex-column gap-2">
                                               @foreach($compra->detalles as $detalle)
                                                    <div class="d-flex align-items-center gap-3 bg-dark-esencia p-2 rounded" style="background: #0d0d0d; border: 1px solid #1a1a1a;">

                                                        {{-- Imagen del producto con protección por si es null --}}
                                                        <img src="{{ asset('img/' . ($detalle->producto?->url_imagen ?? 'izanagi.png')) }}"
                                                            style="width: 40px; height: 40px; object-fit: contain; background: #121212;"
                                                            class="border border-secondary p-1">

                                                        {{-- Info del producto protegida --}}
                                                        <div>
                                                            <span class="fw-bold small text-white d-block">
                                                                {{ $detalle->producto?->nombre ?? 'Suministro Descatalogado / Borrado' }}
                                                            </span>
                                                            <small class="text-secondary font-monospace">
                                                                {{ $detalle->cantidad }} x ${{ number_format($detalle->precio_unitario, 0, ',', '.') }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>

                                        {{-- Columna Total --}}
                                        <td class="text-end py-4" style="width: 25%;">
                                            <span class="text-magenta fw-bold hansip-font" style="font-size: 1.2rem;">
                                                ${{ number_format($compra->total, 0, ',', '.') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5 border border-secondary dashed-border mx-auto" style="max-width: 600px;">
            <i class="ti ti-file-analytics text-secondary mb-3" style="font-size: 3.5rem; opacity: 0.5;"></i>
            <p class="text-secondary hansip-font mb-0">NO SE REGISTRARON COMPRAS PREVIAS VINCULADAS A ESTE PERFIL.</p>
            <a href="{{ route('catalogo') }}" class="btn btn-stanley-legend px-4 py-2 btn-glitch mt-4" style="font-size: 0.8rem;">
                EQUIPAR PRIMER SUMINISTRO
            </a>
        </div>
    @endif
</div>

<style>
    .card-glow { box-shadow: 0 0 20px rgba(200, 13, 85, 0.15); }
    .border-magenta { border: 1px solid #c80d55 !important; }
    .dashed-border { border-style: dashed !important; }
    .bg-dark-esencia { transition: border-color 0.3s ease; }
    .bg-dark-esencia:hover { border-color: #c80d55 !important; }
</style>
@endsection
