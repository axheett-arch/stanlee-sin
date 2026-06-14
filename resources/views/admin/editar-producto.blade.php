@extends('layouts.plantilla')

@section('contenido')
<div class="py-5 text-white d-flex flex-column align-items-center">
    <div class="w-100 mb-4" style="max-width: 600px;">
        <h1 class="hansip-font mb-1">MODIFICAR <span class="text-magenta">SUMINISTRO</span></h1>
        <p class="text-secondary small font-monospace">// PROTOCOLO DE ACTUALIZACIÓN RECURSIVA // ID: #{{ $producto->id }}</p>
    </div>

    <div class="card bg-black border-magenta p-4 w-100" style="max-width: 600px; box-shadow: 0 0 25px rgba(200, 13, 85, 0.15);">
        <form action="{{ route('admin.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- 👈 Directiva vital para que Laravel reconozca el método PUT --}}

            {{-- Nombre --}}
            <div class="mb-3">
                <label for="nombre" class="hansip-font small text-magenta d-block mb-2">DESIGNACIÓN DEL ITEM</label>
                <input type="text" name="nombre" id="nombre" class="form-control bg-dark border-secondary text-white rounded-0 font-monospace" required value="{{ old('nombre', $producto->nombre) }}">
                @error('nombre') <small class="text-danger font-monospace mt-1 d-block">{{ $message }}</small> @enderror
            </div>

          {{-- Precio (Como referencia para saber dónde ubicarlo) --}}
            <div class="mb-3">
                <label for="precio" class="hansip-font small text-magenta d-block mb-2">VALOR DE TRANSFERENCIA ($)</label>
                <input type="number" name="precio" id="precio" class="form-control bg-dark border-secondary text-white rounded-0 font-monospace" min="0" required value="{{ old('precio', $producto->precio) }}">
                @error('precio') <small class="text-danger font-monospace mt-1 d-block">{{ $message }}</small> @enderror
            </div>

            {{-- 👈 NUEVO: Descripción del Suministro con valor precargado --}}
            <div class="mb-3">
                <label for="descripcion" class="hansip-font small text-magenta d-block mb-2">ESPECIFICACIONES (DESCRIPCIÓN)</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="form-control bg-dark border-secondary text-white rounded-0 font-monospace">{{ old('descripcion', $producto->descripcion) }}</textarea>
                @error('descripcion') <small class="text-danger font-monospace mt-1 d-block">{{ $message }}</small> @enderror
            </div>

            {{-- Imagen Actual e Input --}}
            <div class="mb-4">
                <label class="hansip-font small text-magenta d-block mb-2">REPOSITORIO VISUAL (IMAGEN)</label>
                <div class="d-flex align-items-center gap-3 mb-3 p-2 border border-secondary bg-dark">
                    <img src="{{ asset('img/' . ($producto->url_imagen ?? 'izanagi.png')) }}" style="width: 60px; height: 60px; object-fit: contain;">
                    <div class="small text-secondary font-monospace">// Archivo actual asignado en DBeaver</div>
                </div>
                <input type="file" name="imagen" id="imagen" class="form-control bg-dark border-secondary text-white rounded-0 font-monospace" accept="image/*">
                <small class="text-secondary d-block mt-1 font-monospace" style="font-size: 0.75rem;">Dejar vacío para conservar la imagen actual.</small>
                @error('imagen') <small class="text-danger font-monospace mt-1 d-block">{{ $message }}</small> @enderror
            </div>

            {{-- Botones --}}
            <div class="d-flex justify-content-end gap-3 pt-2 border-top border-secondary">
                <a href="{{ route('admin.index') }}" class="btn btn-sm btn-outline-light rounded-0 font-monospace px-4 py-2">
                    ABORTAR
                </a>
                <button type="submit" class="btn btn-sm text-white hansip-font rounded-0 px-4 py-2" style="background-color: #c80d55;">
                    GUARDAR CAMBIOS
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .border-magenta { border: 1px solid #c80d55 !important; }
    .form-control:focus { background-color: #121212 !important; border-color: #c80d55 !important; color: white !important; box-shadow: 0 0 10px rgba(200, 13, 85, 0.25); }
</style>
@endsection
