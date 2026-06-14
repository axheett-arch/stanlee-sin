@extends('layouts.plantilla')

@section('contenido')
<div class="container py-5 text-white d-flex justify-content-center">
    <div class="card bg-black border-magenta p-4 text-center" style="max-width: 600px; width: 100%; box-shadow: 0 0 15px rgba(200, 13, 85, 0.2);">

        {{-- Icono de Éxito Estilo Ciberpunk --}}
        <div class="mb-3">
            <i class="ti ti-shield-check text-magenta" style="font-size: 4rem;"></i>
        </div>

        <h3 class="hansip-font text-white mb-1">OPERACIÓN CONSOLIDADA</h3>
        <p class="text-secondary small font-monospace mb-4">// TRANSMISIÓN ENCRIPTADA // BASE DE DATOS ACTUALIZADA</p>

        {{-- Contenedor del Ticket / Comprobante --}}
        <div class="border border-secondary p-3 text-start bg-dark-esencia rounded mb-4" style="background: #0d0d0d;">
            <div class="d-flex justify-content-between border-bottom border-secondary pb-2 mb-3">
                <span class="font-monospace text-secondary">TICKET ID: #{{ session('ticket_id') }}</span>
                <span class="font-monospace text-magenta">STREET-TECH LN01</span>
            </div>

            <h6 class="text-white small fw-bold font-monospace mb-2">// SUMINISTROS DESPACHADOS:</h6>

            @foreach(session('ticket_productos') as $id => $details)
                <div class="d-flex justify-content-between align-items-center mb-2 font-monospace small">
                    <span class="text-white">- {{ $details['nombre'] }} <small class="text-secondary">(x{{ $details['cantidad'] }})</small></span>
                    <span class="text-secondary">${{ number_format($details['precio'] * $details['cantidad'], 0, ',', '.') }}</span>
                </div>
            @endforeach

            <div class="d-flex justify-content-between border-top border-secondary pt-2 mt-3 font-monospace">
                <span class="fw-bold text-white">TOTAL DEBITADO:</span>
                <span class="fw-bold text-magenta font-monospace">${{ number_format(session('ticket_total'), 0, ',', '.') }}</span>
            </div>
        </div>

        <p class="text-secondary small mb-4">Los suministros ya se encuentran asignados a tu inventario maestro. Podés revisar el historial completo desde tu panel de usuario.</p>

        {{-- Botón de Retorno --}}
        <div>
            <a href="{{ route('catalogo') }}" class="btn btn-outline-magenta px-4 hansip-font btn-sm shadow-sm" style="transition: 0.3s;">
                VOLVER AL CATALOGO
            </a>
        </div>
    </div>
</div>

<style>
    .btn-outline-magenta {
        color: #c80d55;
        border-color: #c80d55;
        background: transparent;
    }
    .btn-outline-magenta:hover {
        color: #white;
        background: #c80d55;
        box-shadow: 0 0 10px rgba(200, 13, 85, 0.5);
    }
    .border-magenta {
        border: 1px solid #c80d55 !important;
    }
</style>
@endsection
