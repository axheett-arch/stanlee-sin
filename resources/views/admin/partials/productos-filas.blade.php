@foreach($productos as $producto)
    <tr class="border-bottom border-secondary">
        <td class="font-monospace text-secondary">#{{ $producto->id }}</td>
        <td>
            <img src="{{ asset('img/' . ($producto->url_imagen ?? 'izanagi.png')) }}"
                 style="width: 45px; height: 45px; object-fit: contain; background: #0d0d0d;"
                 class="border border-secondary p-1">
        </td>
        <td class="fw-bold">{{ $producto->nombre }}</td>
            {{-- Precio (Como referencia para saber dónde ubicarlo) --}}
        <td class="font-monospace text-secondary">${{ number_format($producto->precio, 0, ',', '.') }}</td>


       {{-- Control Visual e Interactivo de Stock Físico --}}
    <td>
        <div class="d-flex align-items-center gap-2 font-monospace">
            <button type="button" class="btn btn-sm btn-outline-secondary p-1 lh-1 rounded-0" onclick="ajustarStock('{{ $producto->id }}', 'bajar')">
                <i class="ti ti-minus" style="font-size: 0.75rem;"></i>
            </button>

            <div id="status-stock-{{ $producto->id }}" style="min-width: 110px; text-align: center;">
                @if($producto->stock == 0)
                    <span class="text-danger fw-bold">// CRÍTICO (0 U)</span>
                @elseif($producto->stock <= 5)
                    <span class="text-warning fw-bold">// STOCK BAJO ({{ $producto->stock }} U)</span>
                @else
                    <span class="text-success">{{ $producto->stock }} U</span>
                @endif
            </div>

            <button type="button" class="btn btn-sm btn-outline-success p-1 lh-1 rounded-0" onclick="ajustarStock('{{ $producto->id }}', 'subir')">
                <i class="ti ti-plus" style="font-size: 0.75rem;"></i>
            </button>
        </div>
    </td>
        <td class="text-center">
            <form action="{{ route('admin.destacar', $producto->id) }}" method="POST">
                @csrf
                @if($producto->destacado)
                    <button type="button" class="btn p-0 text-warning" style="cursor: default; border: none; background: transparent;">
                        <i class="ti ti-star-filled" style="font-size: 1.4rem;"></i>
                    </button>
                @else
                    <button type="submit" class="btn p-0 text-secondary btn-estrella" {{ !$producto->activo ? 'disabled style=opacity:0.2;' : '' }}>
                        <i class="ti ti-star" style="font-size: 1.4rem;"></i>
                    </button>
                @endif
            </form>
        </td>
        <td class="text-center font-monospace small">
            @if($producto->activo)
                <span class="badge bg-success-glow text-success border border-success px-3 py-1 rounded-0" style="background: rgba(25, 135, 84, 0.1);">OPERATIVO</span>
            @else
                <span class="badge bg-danger-glow text-danger border border-danger px-3 py-1 rounded-0" style="background: rgba(220, 53, 69, 0.1);">DISCONTINUADO</span>
            @endif
        </td>
        <td class="text-end">
            <a href="{{ route('admin.edit', $producto->id) }}" class="btn btn-sm btn-outline-warning font-monospace rounded-0 me-1" style="font-size: 0.75rem;">
                <i class="ti ti-edit"></i> EDITAR
            </a>
            <form action="{{ route('admin.destroy', $producto->id) }}" method="POST" class="d-inline">
                @csrf
                @if($producto->activo)
                    <button type="submit" class="btn btn-sm btn-outline-danger font-monospace rounded-0" style="font-size: 0.75rem;"><i class="ti ti-trash"></i> DAR DE BAJA</button>
                @else
                    <button type="submit" class="btn btn-sm btn-outline-success font-monospace rounded-0" style="font-size: 0.75rem;"><i class="ti ti-refresh"></i> REACTIVAR</button>
                @endif
            </form>
        </td>
    </tr>
@endforeach
