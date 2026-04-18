@extends('layouts.plantilla')

@section('contenido')
<div class="row justify-content-center align-items-center min-vh-100 py-5">
    <div class="col-md-6">
        <div class="card-esencia p-5">
            <h2 class="hansip-font text-center mb-4" style="font-size: 2rem;">UNITE A <span class="text-magenta">LA CREW</span></h2>

            <form action="#" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <label class="label-stanley mb-2">NOMBRE COMPLETO</label>
                        <input type="text" class="form-control input-stanley" placeholder="Tu nombre o A.K.A...">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="label-stanley mb-2">EMAIL</label>
                    <input type="email" class="form-control input-stanley" placeholder="correo@ejemplo.com">
                </div>

                <div class="mb-4">
                    <label class="label-stanley mb-2">CONTRASEÑA</label>
                    <input type="password" class="form-control input-stanley" placeholder="Mínimo 8 caracteres">
                </div>

                <button type="submit" class="btn-stanley-legend w-100 mt-3" style="clip-path: none !important;">
                    CREAR CUENTA
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
