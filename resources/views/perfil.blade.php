@extends('layouts.plantilla')

@section('contenido')
<div class="py-5 text-white font-monospace">
    {{-- Encabezado del Módulo --}}
    <div class="text-center mb-5">
        <h1 class="hansip-font" style="font-size: clamp(2rem, 5vw, 3.5rem);">
            PERFIL DE <span class="text-magenta">OPERACIONES</span>
        </h1>
        <p class="text-secondary hansip-font" style="letter-spacing: 2px; font-size: 0.8rem;">
            AUTENTICACIÓN DE IDENTIDAD // ACCESO A CREDENCIALES OPERATIVAS
        </p>
    </div>

    {{-- ALERTAS DE ACCIÓN PROPIAS --}}
    @if(session('success'))
        <div class="alert alert-transparent border-success text-success text-center rounded-0 mb-4 small hansip-font">
            // {{ session('success') }}
        </div>
    @endif

    <div class="row g-4 justify-content-center">
        {{-- COLUMNA IZQUIERDA: Tarjeta de Credencial + Configuración --}}
        <div class="col-12 col-lg-4">
            <div class="card p-4 border-magenta bg-black card-glow text-center rounded-0 mb-4">
                <div class="card p-4 border-magenta bg-black card-glow text-center rounded-0 mb-4">
                {{-- Rango de Lealtad Dinámico --}}
                <small class="d-block mb-3 fw-bold hansip-font" style="color: {{ $rangoColor }}; letter-spacing: 1px;">
                    [ {{ $rangoLealtad }} ]
                </small>

                {{-- Avatar Estilo Táctico (Dinámico) --}}
                <div class="position-relative d-inline-block mx-auto mb-4">
                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-black border shadow overflow-hidden"
                         style="width: 110px; height: 110px; box-shadow: 0 0 15px {{ $rangoColor }}40 !important; border-color: {{ $rangoColor }} !important;">

                        @if($user->avatar)
                            {{-- Si tiene avatar subido, lo muestra --}}
                            <img src="{{ asset('storage/avatars/' . $user->avatar) }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            {{-- Icono por defecto si está vacío --}}
                            <i class="ti ti-user text-white" style="font-size: 3.5rem; color: {{ $rangoColor }} !important;"></i>
                        @endif

                    </div>
                    <span class="position-absolute bottom-0 end-0 badge rounded-circle p-2 border border-black animate-pulse"
                          style="background-color: #c80d55;" title="Sistema en Línea">
                    </span>
                </div>

                {{-- Campos de Datos con Alto Contraste --}}
                <div class="text-start border border-secondary p-3 mb-3" style="background: #080808;">
                    <div class="mb-3">
                        <small class="text-secondary d-block" style="font-size: 0.75rem;">// NOMBRE OPERADOR:</small>
                        <span class="text-white fw-bold fs-5">{{ $user->name }}</span>
                    </div>
                    <div class="mb-3">
                        <small class="text-secondary d-block" style="font-size: 0.75rem;">// CORREO REGISTRADO:</small>
                        <span class="text-white-50" style="color: #e0e0e0 !important;">{{ $user->email }}</span>
                    </div>
                    <div class="mb-3">
                        <small class="text-secondary d-block" style="font-size: 0.75rem;">// PRIVILEGIOS DE ACCESO:</small>
                        @if($user->is_admin)
                            <span class="text-magenta fw-bold"><i class="ti ti-shield-check me-1"></i> CREW ADMIN</span>
                        @else
                            <span class="text-info fw-bold"><i class="ti ti-user me-1"></i> CLIENTE CORE</span>
                        @endif
                    </div>
                    <div class="mb-0">
                        <small class="text-secondary d-block" style="font-size: 0.75rem;">// INVERSIÓN TOTAL LOGÍSTICA:</small>
                        <span class="text-success fw-bold font-monospace">${{ number_format($totalInvertido, 0, ',', '.') }}</span>
                    </div>
                </div>

                {{-- Botón para Desplegar el Formulario de Ajustes --}}
                <button class="btn btn-sm btn-outline-magenta rounded-0 w-100 hansip-font mb-3 py-2 text-uppercase"
                        type="button" data-bs-toggle="collapse" data-bs-target="#configuracionCuenta" aria-expanded="false" aria-controls="configuracionCuenta"
                        style="font-size: 0.8rem; letter-spacing: 1px;">
                    <i class="ti ti-settings-automation me-1"></i> MODIFICAR CREDENCIALES
                </button>

                {{-- Formulario Colapsable de Ajustes Tácticos (¡CON ENCTYPE!) --}}
                <div class="collapse text-start border border-secondary p-3 bg-black" id="configuracionCuenta" style="background-color: #050505 !important;">
                    <form action="{{ route('perfil.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold mb-1">// ACTUALIZAR ALIAS</label>
                            <input type="text" name="name" class="form-control bg-black text-white border-secondary rounded-0 small" value="{{ $user->name }}" required>
                        </div>

                        {{-- 📷 NUEVO CAMPO: SUBIR AVATAR --}}
                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold mb-1">// ASIGNAR AVATAR RECONOCIMIENTO</label>
                            <input type="file" name="avatar" class="form-control bg-black text-white border-secondary rounded-0 small" accept="image/*">
                            <div class="form-text text-muted" style="font-size: 0.65rem;">Formatos admitidos: JPG, PNG. Máx 2MB.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold mb-1">// NUEVA CLAVE (OPCIONAL)</label>
                            <input type="password" name="password" class="form-control bg-black text-white border-secondary rounded-0 small" placeholder="Mínimo 8 caracteres">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold mb-1">// CONFIRMAR CLAVE</label>
                            <input type="password" name="password_confirmation" class="form-control bg-black text-white border-secondary rounded-0 small" placeholder="Repetir contraseña">
                        </div>
                        <button type="submit" class="btn btn-sm text-white w-100 rounded-0" style="background: #c80d55; font-size: 0.75rem;">
                            GUARDAR AJUSTES
                        </button>
                    </form>
                </div>

                <div class="text-secondary small mt-auto pt-2 border-top border-dark text-start">
                    <i class="ti ti-calendar me-1"></i> Alta en sistema: {{ $user->created_at->format('d/m/Y') }}
                </div>
            </div>

                <div class="text-secondary small mt-auto pt-2 border-top border-dark text-start">
                    <i class="ti ti-calendar me-1"></i> Alta en sistema: {{ $user->created_at->format('d/m/Y') }}
                </div>
            </div>
        </div>

        {{-- COLUMNA DERECHA: Monitor de Compras + Historial de Mensajes --}}
        <div class="col-12 col-lg-8 d-flex flex-column gap-4">

            {{-- BLOQUE A: MONITOR DE COMPRAS --}}
            <div class="card p-4 border-secondary bg-black rounded-0">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom border-secondary pb-2">
                    <h4 class="hansip-font text-white m-0" style="font-size: 1.1rem;">
                        <span class="text-magenta">//</span> MONITOR DE COMPRAS RECIENTES
                    </h4>
                    <a href="{{ route('compras.historial') }}" class="text-secondary small text-decoration-none font-monospace bg-dark border border-secondary px-2 py-1 align-hover" style="font-size: 0.75rem; background: #0d0d0d;">
                        VER HISTORIAL COMPLETO
                    </a>
                </div>

                @if($ultimasCompras->count() > 0)
                    <div class="d-flex flex-column gap-3">
                        @foreach($ultimasCompras as $compra)
                            <div class="p-3 border border-dark rounded bg-dark-esencia" style="background: #050505; transition: border-color 0.3s;">
                                <div class="d-flex flex-wrap justify-content-between align-items-center mb-2 border-bottom border-dark pb-2">
                                    <div>
                                        <span class="text-white fw-bold me-2">ÓRDEN #{{ $compra->id }}</span>
                                        <small class="text-secondary">{{ $compra->created_at->format('d/m/Y - H:i') }} hs</small>
                                    </div>
                                    <div>
                                        @if($compra->estado == 'pendiente')
                                            <span class="badge bg-transparent text-warning border border-warning px-2 py-1 calc-badge">
                                                ⚠️ EN ESPERA
                                            </span>
                                        @else
                                            <span class="badge bg-transparent text-success border border-success px-2 py-1 calc-badge">
                                                📦 ENVIADO
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <div class="d-flex flex-wrap gap-1 align-items-center text-white-50 small">
                                            <i class="ti ti-package text-secondary me-1"></i>
                                            @foreach($compra->detalles as $detalle)
                                                <span>{{ $detalle->producto?->nombre ?? 'Suministro' }} (x{{ $detalle->cantidad }})</span>{{ !$loop->last ? ',' : '' }}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <span class="text-magenta fw-bold fs-5">${{ number_format($compra->total, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5 border border-secondary dashed-border my-auto">
                        <i class="ti ti-package-off text-secondary mb-3" style="font-size: 2.5rem; opacity: 0.4;"></i>
                        <p class="text-secondary small mb-0">// LA COLA DE TRANSFERENCIAS ESTÁ VACÍA EXTERNA //</p>
                    </div>
                @endif
            </div>

            {{-- BLOQUE B: HISTORIAL DE CONSULTAS (SOPORTE CENTRAL) --}}
            <div class="card p-4 border-secondary bg-black rounded-0">
                <div class="mb-4 border-bottom border-secondary pb-2">
                    <h4 class="hansip-font text-white m-0" style="font-size: 1.1rem;">
                        <span class="text-magenta">//</span> LOG DE CONSULTAS Y SOPORTE TACTICO
                    </h4>
                </div>

                @if($misConsultas->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle m-0" style="--bs-table-bg: transparent;">
                            <thead>
                                <tr class="text-secondary border-bottom border-secondary small">
                                    <th>FECHA</th>
                                    <th>ASUNTO</th>
                                    <th>MENSAJE EMITIDO</th>
                                    <th class="text-end">ESTADO</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($misConsultas as $consulta)
                                    <tr class="border-bottom border-dark small">
                                        <td class="text-secondary-light font-monospace">{{ $consulta->created_at->format('d/m/Y') }}</td>
                                        <td class="text-white fw-bold">{{ $consulta->asunto ?? 'Consulta General' }}</td>
                                        <td class="text-secondary font-monospace" style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            "{{ $consulta->mensaje }}"
                                        </td>
                                        <td class="text-end">
                                            @if($consulta->leido)
                                                <span class="badge bg-transparent text-success border border-success px-2 py-1 calc-badge">
                                                    ✅ ATENDIDO
                                                </span>
                                            @else
                                                <span class="badge bg-transparent text-magenta border border-magenta px-2 py-1 calc-badge">
                                                    ⏳ EN COLA
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4 border border-secondary dashed-border">
                        <i class="ti ti-message-off text-secondary mb-2" style="font-size: 2rem; opacity: 0.4;"></i>
                        <p class="text-secondary small mb-0">// NO SE REGISTRARON SOLICITUDES DE SOPORTE VINCULADAS //</p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>

<style>
    .card-glow { box-shadow: 0 0 20px rgba(200, 13, 85, 0.15); }
    .border-magenta { border: 1px solid #c80d55 !important; }
    .btn-outline-magenta { border: 1px solid #c80d55; color: #c80d55; transition: 0.3s; }
    .btn-outline-magenta:hover { background-color: #c80d55; color: white; }
    .dashed-border { border-style: dashed !important; }
    .bg-dark-esencia:hover { border-color: #6c757d !important; }
    .calc-badge { font-size: 0.65rem; letter-spacing: 0.5px; }
    .align-hover:hover { border-color: #c80d55 !important; color: #ffffff !important; transition: 0.2s; }
    .text-secondary-light { color: #a0a6ac !important; }
</style>
@endsection
