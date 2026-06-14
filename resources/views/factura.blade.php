@extends('layouts.plantilla')

@section('contenido')
<div class="py-5 text-white d-flex flex-column align-items-center">

    {{-- Contenedor de la Factura / Remito --}}
    <div id="invoice-card" class="card bg-black border-magenta p-5 mb-4" style="max-width: 700px; width: 100%; box-shadow: 0 0 25px rgba(200, 13, 85, 0.15);">

        {{-- Encabezado de la Factura --}}
        <div class="d-flex justify-content-between align-items-start border-bottom border-secondary pb-4 mb-4">
            <div>
                <h2 class="hansip-font text-magenta mb-0">STANLEE SIN</h2>
                <p class="text-secondary small font-monospace mb-0">UNIT: AXEL & TIAGO DEVS // CORRIENTES, ARG</p>
            </div>
            <div class="text-end font-monospace small">
                <h5 class="text-white fw-bold mb-1">COMPROBANTE ELECTRÓNICO</h5>
                <span class="text-secondary d-block">TICKET ID: #{{ $venta->id }}</span>
                <span class="text-secondary">FECHA: {{ $venta->created_at->format('d/m/Y - H:i') }} hs</span>
            </div>
        </div>

        {{-- Datos del Cliente --}}
        <div class="mb-4 font-monospace small">
            <h6 class="text-magenta fw-bold mb-2">// DETALLES DEL OPERADOR:</h6>
            <div class="text-white">CLIENTE: <span class="text-secondary">{{ strtoupper(Auth::user()->name) }}</span></div>
            <div class="text-white">EMAIL ID: <span class="text-secondary">{{ Auth::user()->email }}</span></div>
        </div>

        {{-- Tabla de Suministros --}}
        <div class="table-responsive mb-4">
            <table class="table table-dark align-middle text-white font-monospace small" style="--bs-table-bg: transparent;">
                <thead>
                    <tr class="text-magenta" style="border-bottom: 1px solid #c80d55;">
                        <th>ITEM / SUMINISTRO</th>
                        <th class="text-center">CANTIDAD</th>
                        <th class="text-end">PRECIO UNIT.</th>
                        <th class="text-end">SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($venta->detalles as $detalle)
                        <tr class="border-bottom border-secondary">
                            <td class="py-3 fw-bold text-white">
                                {{ $detalle->producto?->nombre ?? 'Suministro Descatalogado' }}
                            </td>
                            <td class="text-center py-3 text-secondary">{{ $detalle->cantidad }}</td>
                            <td class="text-end py-3 text-secondary">${{ number_format($detalle->precio_unitario, 0, ',', '.') }}</td>
                            <td class="text-end py-3 text-magenta fw-bold">
                                ${{ number_format($detalle->precio_unitario * $detalle->cantidad, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Total Global --}}
        <div class="d-flex justify-content-between align-items-center border-top border-secondary pt-4 mt-2">
            <span class="hansip-font text-secondary" style="font-size: 0.9rem;">TOTAL DEBITADO:</span>
            <span class="text-magenta h3 hansip-font mb-0">${{ number_format($venta->total, 0, ',', '.') }}</span>
        </div>
    </div>

    {{-- Botones de Control de la Interfaz --}}
    <div class="d-flex gap-3">
        <a href="{{ route('compras.historial') }}" class="btn btn-sm btn-outline-light hansip-font px-4 py-2 rounded-0">
            VOLVER AL HISTORIAL
        </a>
        <button onclick="window.print();" class="btn btn-sm text-white hansip-font px-4 py-2 rounded-0" style="background-color: #c80d55;">
            <i class="ti ti-printer me-1"></i> IMPRIMIR COMPROBANTE
        </button>
    </div>
</div>

<style>
    .border-magenta { border: 1px solid #c80d55 !important; }

    /* Regla CSS Pro: Oculta los botones cuando se manda a imprimir la factura */
    @media print {
        .btn, nav, footer, .btn-scroll-top { display: none !important; }
        body { background-color: white !important; color: black !important; }
        #invoice-card { border: 1px solid #000 !important; box-shadow: none !important; background: white !important; color: black !important; }
        .text-white { color: black !important; }
        .table { --bs-table-color: black !important; }
    }
</style>
@endsection
