@extends('layouts.plantilla')

@section('contenido')
<div class="row justify-content-center align-items-center py-5">
    <div class="col-md-5">
        <div class="card-esencia p-5">

            <div class="text-center mb-2">
                <span class="text-secondary hansip-font" style="font-size: 0.7rem; letter-spacing: 3px; opacity: 0.6;">
                    — TU VOLUNTAD, MI MANO —
                </span>
            </div>

            <h2 class="hansip-font text-center mb-4" style="font-size: 2.2rem;">
                ACCEDER A LA <span class="text-magenta">VISIÓN</span>
            </h2>

            <form action="#" method="POST">
                <div class="mb-4">
                    <label class="label-stanley mb-2">USUARIO / EMAIL</label>
                    <input type="text" class="form-control input-stanley" placeholder="Ingresá tu tag o mail...">
                </div>

                <div class="mb-4">
                    <label class="label-stanley mb-2">CONTRASEÑA</label>
                    <input type="password" class="form-control input-stanley" placeholder="••••••••">
                </div>

                <button type="submit" class="btn-stanley-legend w-100 mt-3" style="clip-path: none !important;">
                    ENTRAR
                </button>
            </form>

            <p class="text-center mt-4 text-secondary small">
                ¿Todavía no sos parte? <a href="/registro" class="text-magenta text-decoration-none">Registrate acá</a>
            </p>
        </div>
    </div>
</div>
@endsection

