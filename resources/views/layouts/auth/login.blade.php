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

                <!-- 1. Apuntamos a la ruta de login de Breeze con método POST -->
                <form action="{{ route('login') }}" method="POST">
                    <!-- 2. Token de seguridad CSRF obligatorio siempre adentro del form -->
                    @csrf

                    <div class="mb-4">
                        <label class="label-stanley mb-2">USUARIO / EMAIL</label>
                        <!-- 3. Agregamos name="email" y el old() por si falla la clave no tener que reescribir el mail -->
                        <input type="email" name="email" class="form-control input-stanley"
                               placeholder="Ingresá tu mail..." value="{{ old('email') }}" required autofocus>

                        @error('email')
                            <div class="text-danger small mt-1" style="font-weight: 500;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="label-stanley mb-2">CONTRASEÑA</label>
                        <!-- 4. Agregamos name="password" -->
                        <input type="password" name="password" class="form-control input-stanley"
                               placeholder="••••••••" required>

                        @error('password')
                            <div class="text-danger small mt-1" style="font-weight: 500;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Recordarme (Súper útil para el login) -->
                    <div class="mb-4 form-check d-flex align-items-center gap-2">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input" style="accent-color: #c80d55;">
                        <label for="remember" class="text-secondary small mb-0" style="cursor: pointer; user-select: none;">Recordarme</label>
                    </div>

                    <!-- 5. Cambiamos a type="submit" para que procese el formulario real -->
                    <button type="submit"
                        class="btn-outline-light btn-sm hansip-font w-100"
                        style="background-color: #c80d55; border-color: #c80d55; color: white; font-size: 1.1rem; padding: 12px 20px; text-decoration: none; transform: skewX(-10deg); border: none; cursor: pointer;">
                        ENTRAR
                    </button>
                </form>

                <p class="text-center mt-4 text-secondary small">
                    ¿Todavía no sos parte? <a href="{{ route('register') }}" class="text-magenta text-decoration-none">Registrate acá</a>
                </p>
            </div>
        </div>
    </div>
@endsection
