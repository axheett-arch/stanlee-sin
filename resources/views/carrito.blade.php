@extends('layouts.plantilla')

@section('contenido')
<div class="py-5 text-white">
    <div class="text-center mb-5">
        <h1 class="hansip-font" style="font-size: 3rem;">TU <span class="text-magenta">INVENTARIO</span></h1>
        <p class="text-secondary hansip-font" style="font-size: 0.8rem;">REVISIÓN DE SUMINISTROS PRE-COMPRA</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success bg-black border-magenta text-magenta text-center hansip-font mb-4" style="font-size: 0.8rem;">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <div class="card-esencia p-4 border-magenta bg-black mb-4">
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0 text-white" style="--bs-table-bg: transparent;">
                    <thead>
                        <tr class="text-magenta hansip-font small">
                            <th>ITEM</th>
                            <th>PRECIO</th>
                            <th>CANTIDAD</th>
                            <th>SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $details)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ asset('img/' . $details['imagen']) }}" style="width: 50px; height: 50px; object-fit: contain;">
                                        <span class="fw-bold">{{ $details['nombre'] }}</span>
                                    </div>
                                </td>
                                <td>${{ number_format($details['precio'], 0, ',', '.') }}</td>
                                <td>{{ $details['cantidad'] }} unidades</td>
                                <td class="text-magenta">${{ number_format($details['precio'] * $details['cantidad'], 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center border-top border-secondary mt-4 pt-4">
                <h4 class="hansip-font mb-0">TOTAL CRÉDITOS:</h4>
                <span class="text-magenta h3 hansip-font">${{ number_format($total, 0, ',', '.') }}</span>
            </div>
        </div>

        <div class="text-end">
            <form action="{{ route('cart.confirm') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-stanley-legend px-5 py-3 btn-glitch text-decoration-none d-inline-block">
                    CONFIRMAR OPERACIÓN // VACIAR INVENTARIO
                </button>
            </form>
        </div>
    @else
        <div class="text-center py-5 border border-secondary dashed-border">
            <p class="text-secondary hansip-font">NO SE ENCONTRARON SUMINISTROS EN EL INVENTARIO.</p>
            <a href="{{ route('catalogo.index') }}" class="btn btn-stanley-legend px-4 py-2 btn-glitch mt-3" style="font-size: 0.8rem;">VOLVER AL CATALOGO</a>
        </div>
    @endif
</div>
@endsection
