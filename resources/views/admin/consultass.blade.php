@extends('layouts.plantilla')

@section('contenido')
<div class="py-5 text-white">
    {{-- Encabezado de la Sección Admin --}}
    <div class="mb-5">
        <h1 class="hansip-font mb-1">CENTRAL <span class="text-magenta">CONSULTAS</span></h1>
        <p class="text-secondary small font-monospace">// BANDEJA DE ENTRADA // MÓDULO DE ATENCIÓN DE CLIENTES</p>
    </div>

    {{-- Cartel de éxito táctico para las alertas de Laravel --}}
    @if(session('success'))
        <div class="alert alert-success bg-black border-magenta text-magenta text-center hansip-font mb-4" style="font-size: 0.8rem; box-shadow: 0 0 15px rgba(200, 13, 85, 0.2);">
            // {{ session('success') }}
        </div>
    @endif

    {{-- Verificamos si la tabla de DBeaver está vacía --}}
    @if($contactos->isEmpty())
        <div class="card bg-black border-secondary p-5 text-center opacity-50 rounded-0">
            <i class="ti ti-mail-opened text-secondary mb-2" style="font-size: 3rem;"></i>
            <p class="hansip-font text-secondary small mb-0">// BANDEJA LIMPIA: NO HAY MENSAJES PENDIENTES</p>
        </div>
    @else
        {{-- Acordeón interactivo de Bootstrap para leer mensajes sin recargar --}}
        <div class="accordion accordion-flush border border-secondary" id="accordionContactos" style="background: transparent;">
            @foreach($contactos as $con)
                <div class="accordion-item bg-black border-bottom border-secondary text-white">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-black text-white font-monospace d-flex justify-content-between align-items-center py-3 shadow-none"
                                type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{ $con->id }}" aria-expanded="false">
                            <div class="d-flex align-items-center gap-3 w-100 me-3">

                                {{-- Badge dinámico de estado (Leído / Nuevo) --}}
                                @if(!$con->leido)
                                    <span class="badge rounded-0 px-2 py-1 test-blink" style="background-color: #c80d55; color: white; font-size: 0.65rem;">NUEVO</span>
                                @else
                                    <span class="badge rounded-0 bg-secondary text-dark px-2 py-1" style="font-size: 0.65rem;">ARCHIVADO</span>
                                @endif

                                <span class="text-magenta fw-bold" style="min-width: 150px;">{{ $con->nombre }}</span>
                                <span class="text-white flex-grow-1 text-truncate opacity-75" style="max-width: 350px;">{{ $con->motivo }}</span>
                                <span class="text-secondary small ms-auto">{{ $con->created_at->format('d/m H:i') }} hs</span>
                            </div>
                        </button>
                    </h2>

                    {{-- Contenedor colapsable con el cuerpo del mensaje --}}
                    <div id="flush-collapse-{{ $con->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionContactos">
                        <div class="accordion-body bg-dark-gradient p-4 border-top border-secondary font-monospace">
                            <div class="mb-3">
                                <span class="text-secondary small">// EMISOR:</span>
                                <a href="mailto:{{ $con->email }}" class="text-magenta text-decoration-none fw-bold">{{ $con->email }}</a>
                            </div>
                            <div class="mb-4 bg-black p-3 border border-secondary text-secondary-light" style="white-space: pre-line;">
                                {{ $con->mensaje }}
                            </div>
                            <div class="d-flex justify-content-end align-items-center gap-2">

                                {{-- 📬 BOTÓN REESTRUCTURADO: Ahora es sólido con texto blanco de alta visibilidad --}}
                                <a href="mailto:{{ $con->email }}?subject={{ rawurlencode('RE: StanLee Sin - Soporte por ' . $con->motivo) }}&body={{ rawurlencode("¡Hola, " . $con->nombre . "! Gracias por comunicarte con el equipo de StanLee Sin.\n\nRespecto a tu consulta sobre \"" . $con->motivo . "\":\n\n[Escribí tu respuesta acá]\n\n--\nSaludos cordiales,\nAxel & Tiago | Administración Central") }}"
                                   class="btn btn-sm text-white font-monospace rounded-0 px-3 d-flex align-items-center gap-1 btn-responder-tactic">
                                    <i class="ti ti-arrow-forward" style="font-size: 1rem;"></i> RESPONDER
                                </a>

                                {{-- Si no está leído, muestra el botón para cambiar el estado en DBeaver --}}
                                @if(!$con->leido)
                                    <form action="{{ route('admin.contactos.leer', $con->id) }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-success font-monospace rounded-0 px-3 py-1 lh-base">
                                            <i class="ti ti-check me-1"></i> MARCAR COMO ATENDIDO
                                        </button>
                                    </form>
                                @endif

                                {{-- Formulario para la eliminación física --}}
                                <form action="{{ route('admin.contactos.destroy', $con->id) }}" method="POST" class="m-0" onsubmit="return confirm('¿Confirmás la eliminación permanente de este registro de la base de datos?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger font-monospace rounded-0 px-3 py-1 lh-base">
                                        <i class="ti ti-trash me-1"></i> ELIMINAR
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
    .accordion-button::after { filter: invert(1); } /* Pone la flechita de Bootstrap en blanco neón */
    .bg-dark-gradient { background: linear-gradient(180deg, #000 0%, #0c0608 100%); }
    .text-secondary-light { color: #d0d0d0; }
    @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0.4; } }
    .test-blink { animation: blink 1.5s infinite; }

    /* Estilo exclusivo para el botón responder */
    .btn-responder-tactic {
        background-color: #c80d55 !important;
        border: 1px solid #c80d55 !important;
        transition: background-color 0.2s ease, box-shadow 0.2s ease;
    }
    .btn-responder-tactic:hover {
        background-color: #a00a43 !important;
        box-shadow: 0 0 10px rgba(200, 13, 85, 0.6);
        color: white !important;
    }
</style>
@endsection
