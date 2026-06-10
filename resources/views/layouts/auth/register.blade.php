@extends('layouts.plantilla')

@section('contenido')
    <div class="row justify-content-center align-items-center min-vh-100 py-5">
        <div class="col-md-6">
            <div class="card-esencia p-5">
                <h2 class="hansip-font text-center mb-4" style="font-size: 2rem;">UNITE A <span class="text-magenta">LA CREW</span></h2>

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label class="label-stanley mb-2">NOMBRE COMPLETO</label>
                            <!-- 3. Agregamos name="name" y value="{{ old('name') }}" para que no se borre si algo falla -->
                            <input type="text" name="name" class="form-control input-stanley"
                                   placeholder="Tu nombre o A.K.A..." value="{{ old('name') }}" required autofocus>

                            @error('name')
                                <div class="text-danger small mt-1" style="font-weight: 500;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="label-stanley mb-2">EMAIL</label>
                        <!-- Agregamos value="{{ old('email') }}" por comodidad del usuario -->
                        <input type="email" name="email" class="form-control input-stanley"
                               placeholder="correo@ejemplo.com" value="{{ old('email') }}" required>

                        @error('email')
                            <div class="text-danger small mt-1" style="font-weight: 500;">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="label-stanley mb-2">CONTRASEÑA</label>
                            <input type="password" name="password" class="form-control input-stanley"
                                   placeholder="Mínimo 8 caracteres" required>

                            @error('password')
                                <div class="text-danger small mt-1" style="font-weight: 500;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="label-stanley mb-2">CONFIRMAR CLAVE</label>
                            <!-- 5. Campo requerido por Laravel: name="password_confirmation" -->
                            <input type="password" name="password_confirmation" class="form-control input-stanley"
                                   placeholder="Repetir clave" required>
                        </div>
                    </div>

                    <button type="submit" class="btn-outline-light btn-sm hansip-font w-100"
                        style="background-color: #c80d55; border-color: #c80d55; color: white; font-size: 1.1rem; padding: 12px 20px; text-decoration: none; transform: skewX(-10deg); border: none; cursor: pointer;">
                        UNIRSE A LA CREW
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
