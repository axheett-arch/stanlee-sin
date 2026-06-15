@extends('layouts.plantilla')

@section('contenido')
<div class="container-fluid py-4 font-monospace">
    <div class="mb-4 border-bottom border-secondary pb-3">
        <h2 class="text-white fw-bold m-0 hansip-font">
            <span class="text-magenta">//</span> CENTRAL DE PEDIDOS
        </h2>
        <div class="d-flex justify-content-between align-items-center mt-1">
            <small class="text-secondary">Monitoreo de órdenes de compra entrantes y despachos.</small>
            <span class="badge bg-black text-magenta border border-magenta px-3 py-2">
                PENDIENTES: {{ $pedidosPendientes->count() }}
            </span>
        </div>
    </div>

    <ul class="nav nav-tabs border-secondary mb-3" id="pedidosTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active bg-transparent text-white border-secondary border-bottom-0 fw-bold custom-tab"
                    id="pendientes-tab" data-bs-toggle="tab" data-bs-target="#pendientes"
                    type="button" role="tab" aria-controls="pendientes" aria-selected="true">
                🚨 POR DESPACHAR ({{ $pedidosPendientes->count() }})
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link bg-transparent text-secondary border-0 fw-bold custom-tab"
                    id="despachados-tab" data-bs-toggle="tab" data-bs-target="#despachados"
                    type="button" role="tab" aria-controls="despachados" aria-selected="false">
                ✅ ENVIADOS ({{ $pedidosDespachados->count() }})
            </button>
        </li>
    </ul>

    <div class="tab-content" id="pedidosTabsContent">

        <div class="tab-pane fade show active" id="pendientes" role="tabpanel" aria-labelledby="pendientes-tab">
            <div class="table-responsive bg-black border border-secondary p-3">
                <table class="table table-dark table-hover align-middle m-0" style="--bs-table-bg: #000000;">
                    <thead>
                        <tr class="text-secondary border-bottom border-secondary">
                            <th scope="col" class="bg-black"># ÓRDEN</th>
                            <th scope="col" class="bg-black">CLIENTE</th>
                            <th scope="col" class="bg-black">PRODUCTOS A PREPARAR</th>
                            <th scope="col" class="bg-black">TOTAL</th>
                            <th scope="col" class="bg-black">ESTADO</th>
                            <th scope="col" class="bg-black">FECHA</th>
                            <th scope="col" class="text-end bg-black">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pedidosPendientes as $pedido)
                            <tr class="border-bottom border-dark">
                                <td class="fw-bold text-white bg-black">#{{ $pedido->id }}</td>
                                <td class="bg-black">
                                    <div class="text-white fw-bold">{{ $pedido->user->name ?? 'Invitado' }}</div>
                                    <small class="text-secondary-light">{{ $pedido->user->email ?? '' }}</small>
                                </td>
                                <td class="bg-black">
                                    <div class="p-2 border border-secondary rounded shadow-sm" style="max-width: 400px; background-color: rgba(255, 255, 255, 0.02) !important;">
                                        <ul class="list-unstyled m-0 p-0 small">
                                            @forelse($pedido->detalles as $detalle)
                                                <li class="text-white-50 d-flex justify-content-between align-items-center py-2 border-bottom border-dark last-border-0">
                                                    <div class="d-flex align-items-center">
                                                        @if(!empty($detalle->producto->url_imagen))
                                                            <div class="rounded border border-secondary bg-black d-flex align-items-center justify-content-center me-2"
                                                                 style="width: 45px; height: 45px; overflow: hidden; background-color: #080808 !important;">
                                                                <img src="{{ asset('img/' . $detalle->producto->url_imagen) }}"
                                                                     alt="{{ $detalle->producto->nombre }}"
                                                                     style="max-width: 100%; max-height: 100%; object-fit: contain; padding: 2px;">
                                                            </div>
                                                        @else
                                                            <div class="rounded border border-secondary bg-dark d-flex align-items-center justify-content-center me-2"
                                                                 style="width: 45px; height: 45px;">
                                                                <i class="ti ti-photo text-muted" style="font-size: 1rem;"></i>
                                                            </div>
                                                        @endif
                                                        <span class="text-white">{{ $detalle->producto->nombre ?? 'Producto Eliminado' }}</span>
                                                    </div>
                                                    <span class="badge bg-secondary text-dark fw-bold px-2">x{{ $detalle->cantidad }}</span>
                                                </li>
                                            @empty
                                                <li class="text-muted italic">// Sin artículos registrados</li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </td>
                                <td class="text-magenta fw-bold bg-black">${{ number_format($pedido->total, 2, ',', '.') }}</td>
                                <td class="bg-black">
                                    <span class="badge bg-transparent text-warning border border-warning px-2 py-1 small" style="font-size: 0.75rem;">
                                        ⚠️ PENDIENTE
                                    </span>
                                </td>
                                <td class="text-secondary small bg-black">{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                                <td class="text-end bg-black">
                                    <form action="{{ route('admin.pedidos.despachar', $pedido->id) }}" method="POST" class="d-inline">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="btn btn-sm text-white text-uppercase"
                                                style="border: 1px solid #c80d55; background: transparent; transform: skewX(-10deg); font-size: 0.8rem; transition: 0.3s;">
                                            <span style="transform: skewX(10deg); display: inline-block;">
                                                <i class="ti ti-truck-delivery me-1"></i> DESPACHAR
                                            </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-secondary bg-black">
                                    <i class="ti ti-package-off fs-2 d-block mb-2 text-magenta"></i>
                                    // No hay pedidos pendientes en el sistema. Crew al día.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="despachados" role="tabpanel" aria-labelledby="despachados-tab">
            <div class="table-responsive bg-black border border-secondary p-3">
                <table class="table table-dark table-hover align-middle m-0" style="--bs-table-bg: #000000;">
                    <thead>
                        <tr class="text-secondary border-bottom border-secondary">
                            <th scope="col" class="bg-black"># ÓRDEN</th>
                            <th scope="col" class="bg-black">CLIENTE</th>
                            <th scope="col" class="bg-black">PRODUCTOS ENVIADOS</th>
                            <th scope="col" class="bg-black">TOTAL</th>
                            <th scope="col" class="bg-black">ESTADO</th>
                            <th scope="col" class="bg-black">DESPACHADO EL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pedidosDespachados as $pedido)
                            <tr class="border-bottom border-dark">
                                <td class="fw-bold text-secondary bg-black">#{{ $pedido->id }}</td>
                                <td class="bg-black">
                                    <div class="text-white fw-bold">{{ $pedido->user->name ?? 'Invitado' }}</div>
                                    <small class="text-secondary-light">{{ $pedido->user->email ?? '' }}</small>
                                </td>
                                <td class="bg-black">
                                    <div class="p-2 border border-secondary rounded" style="max-width: 400px; background-color: rgba(255, 255, 255, 0.02) !important;">
                                        <ul class="list-unstyled m-0 p-0 small">
                                            @foreach($pedido->detalles as $detalle)
                                                <li class="d-flex justify-content-between align-items-center py-2 border-bottom border-dark last-border-0">
                                                    <div class="d-flex align-items-center">
                                                        @if(!empty($detalle->producto->url_imagen))
                                                            <div class="rounded border border-secondary bg-black d-flex align-items-center justify-content-center me-2"
                                                                 style="width: 45px; height: 45px; overflow: hidden; background-color: #080808 !important;">
                                                                <img src="{{ asset('img/' . $detalle->producto->url_imagen) }}"
                                                                     alt="{{ $detalle->producto->nombre }}"
                                                                     style="max-width: 100%; max-height: 100%; object-fit: contain; padding: 2px;">
                                                            </div>
                                                        @else
                                                            <div class="rounded border border-secondary bg-dark d-flex align-items-center justify-content-center me-2"
                                                                 style="width: 45px; height: 45px;">
                                                                <i class="ti ti-photo text-muted" style="font-size: 1rem;"></i>
                                                            </div>
                                                        @endif
                                                        <span class="text-white">{{ $detalle->producto->nombre ?? 'Producto Eliminado' }}</span>
                                                    </div>
                                                    <span class="badge bg-secondary text-dark fw-bold px-2">x{{ $detalle->cantidad }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                                <td class="text-secondary fw-bold bg-black">${{ number_format($pedido->total, 2, ',', '.') }}</td>
                                <td class="bg-black">
                                    <span class="badge bg-transparent text-success border border-success px-2 py-1 small" style="font-size: 0.75rem;">
                                        📦 DESPACHADO
                                    </span>
                                </td>
                                <td class="text-secondary small bg-black">{{ $pedido->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-secondary bg-black">
                                    // Todavía no se despachó ninguna órden en este turno.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<style>
    .custom-tab { transition: all 0.3s ease; }
    .nav-tabs .nav-link.active {
        background-color: transparent !important;
        border-color: #6c757d !important;
        border-bottom-color: #000000 !important;
        color: #c80d55 !important;
    }
    .nav-tabs .nav-link:not(.active):hover { color: #ffffff !important; border-color: transparent; }
    .last-border-0:last-child { border-bottom: 0 !important; }
    .text-secondary-light { color: #a0a6ac !important; }
</style>
@endsection
