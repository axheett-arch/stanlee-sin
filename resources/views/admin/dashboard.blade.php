@extends('layouts.plantilla')

@section('contenido')
<div class="py-5 text-white">
    {{-- Encabezado --}}
    <div class="mb-5">
        <h1 class="hansip-font mb-1">CORE <span class="text-magenta">DASHBOARD</span></h1>
        <p class="text-secondary small font-monospace">// SISTEMA OPERATIVO CENTRAL // MONITOREO EN TIEMPO REAL</p>
    </div>

    {{-- Grilla de Tarjetas de Métricas (KPIs) --}}
    <div class="row g-4 mb-5">

        {{-- Tarjeta 1: Total Facturado --}}
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card bg-black border-magenta p-4 h-100" style="box-shadow: 0 0 15px rgba(200, 13, 85, 0.1);">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="text-secondary small font-monospace">// CAPITAL INTEGRAL</span>
                    <i class="ti ti-currency-dollar text-magenta fs-2"></i>
                </div>
                <h3 class="font-monospace fw-bold text-white mb-1">${{ number_format($totalFacturado, 0, ',', '.') }}</h3>
                <p class="small font-monospace text-magenta mb-0">TOTAL FACTURADO</p>
            </div>
        </div>

        {{-- Tarjeta 2: Órdenes Procesadas --}}
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card bg-black border-secondary p-4 h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="text-secondary small font-monospace">// LOGÍSTICA</span>
                    <i class="ti ti-package text-info fs-2"></i>
                </div>
                <h3 class="font-monospace fw-bold text-white mb-1">#{{ $totalOrdenes }}</h3>
                <p class="small font-monospace text-info mb-0">PEDIDOS PROCESADOS</p>
            </div>
        </div>

        {{-- Tarjeta 3: Arsenal de Productos --}}
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card bg-black border-secondary p-4 h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="text-secondary small font-monospace">// STOCK GENERAL</span>
                    <i class="ti ti-shield-half-filled text-success fs-2"></i>
                </div>
                <h3 class="font-monospace fw-bold text-white mb-1">{{ $totalSuministros }} ITEMS</h3>
                <p class="small font-monospace text-success mb-0">SUMINISTROS ACTIVOS</p>
            </div>
        </div>

        {{-- Tarjeta 4: Usuarios Registrados --}}
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card bg-black border-secondary p-4 h-100">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="text-secondary small font-monospace">// IDENTIDADES</span>
                    <i class="ti ti-users text-warning fs-2"></i>
                </div>
                <h3 class="font-monospace fw-bold text-white mb-1">{{ $totalUsuarios }}</h3>
                <p class="small font-monospace text-warning mb-0">USUARIOS BASE</p>
            </div>
        </div>

    </div>

    {{-- Contenedor de Bienvenida Táctica --}}
    <div class="card bg-black border-magenta p-5 text-center position-relative overflow-hidden rounded-0" style="background: linear-gradient(135deg, #000000 0%, #0a0507 100%); border-left: 5px solid #c80d55 !important;">
        <div class="my-3">
            <i class="ti ti-device-laptop text-magenta mb-3" style="font-size: 3.5rem; filter: drop-shadow(0 0 10px #c80d55);"></i>
            <h2 class="hansip-font mb-2">BIENVENIDO AL PANEL DE CONTROL</h2>
            <p class="text-secondary mx-auto font-monospace small mb-4" style="max-width: 600px;">
                Sesión autorizada para el Administrador de la plataforma Stanlee sin. Utilice el menú lateral estratégico para auditar suministros, actualizar el catálogo público o gestionar las solicitudes operacionales.
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('admin.index') }}" class="btn btn-sm btn-outline-magenta font-monospace rounded-0 px-4 py-2">
                    <i class="ti ti-building-store me-1"></i> VER INVENTARIO
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .border-magenta { border: 1px solid #c80d55 !important; }
    .btn-outline-magenta { border: 1px solid #c80d55; color: #c80d55; }
    .btn-outline-magenta:hover { background-color: #c80d55; color: white; }
</style>
@endsection
