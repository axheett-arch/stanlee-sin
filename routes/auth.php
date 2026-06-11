<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules;

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación Autogestionadas (Ultra-Flexibles y a Prueba de Fallos)
|--------------------------------------------------------------------------
| Diseñadas para adaptarse automáticamente a la estructura de tus carpetas
| y evitar pantallas de error genéricas de Laravel si faltan archivos.
*/

Route::middleware('guest')->group(function () {

    // Redirección inteligente: si escribís /registro en el navegador, te manda a /register sin dar 404
    Route::get('registro', function () {
        return redirect()->route('register');
    });

    // 1. Mostrar pantalla de Registro (Detecta automáticamente dónde guardaste tu archivo Blade)
    Route::get('register', function () {
        if (view()->exists('layouts.auth.register')) {
            return view('layouts.auth.register');
        }
        if (view()->exists('auth.register')) {
            return view('auth.register');
        }
        if (view()->exists('register')) {
            return view('register');
        }
        if (view()->exists('registro')) {
            return view('registro');
        }

        // Si no se encuentra ningún archivo, mostramos un aviso amigable y personalizado
        return response('
            <div style="background:#0b0b0b; color:#fff; font-family:\'Segoe UI\', sans-serif; padding:40px; height:100vh; display:flex; align-items:center; justify-content:center; margin:0;">
                <div style="max-width:600px; border: 2px solid #c80d55; padding: 40px; border-radius: 12px; background: #121212; box-shadow: 0 10px 30px rgba(200, 13, 85, 0.15);">
                    <h2 style="color:#c80d55; margin-top:0; font-family:sans-serif; letter-spacing:1px;">⚠️ ¡FALTA LA VISTA DE REGISTRO!</h2>
                    <p style="color:#ccc; font-size:1.1rem; line-height:1.6;">Laravel no encuentra el archivo visual para registrar usuarios.</p>
                    <p style="color:#aaa; font-size:0.95rem;">Asegurate de tener creado el archivo en tu VS Code exactamente en alguna de estas ubicaciones:</p>
                    <ul style="line-height:1.8; color:#00ffcc; font-family:monospace; font-size:1rem; list-style-type: none; padding-left: 0;">
                        <li>📂 resources/views/layouts/auth/register.blade.php <span style="color:#888; font-size:0.8rem;">(Tu ubicación actual)</span></li>
                        <li>📂 resources/views/auth/register.blade.php <span style="color:#888; font-size:0.8rem;">(Recomendado estándar)</span></li>
                        <li>📂 resources/views/register.blade.php</li>
                    </ul>
                    <hr style="border: 0; border-top: 1px solid #333; margin: 25px 0;">
                    <p style="margin-bottom:0; color:#666; font-size:0.85rem;">Crea el archivo, pegale tu código de registro, guardalo y recargá esta página.</p>
                </div>
            </div>
        ');
    })->name('register');

    // 2. Procesar el Registro en la Base de Datos
    Route::post('register', function (Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Guardamos el usuario con la contraseña encriptada de forma segura en MariaDB
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Lo logueamos automáticamente
        Auth::login($user);

        // Lo mandamos al inicio
        return redirect('/');
    });

    // 3. Mostrar pantalla de Login (Detecta automáticamente dónde guardaste tu archivo Blade)
    Route::get('login', function () {
        if (view()->exists('layouts.auth.login')) {
            return view('layouts.auth.login');
        }
        if (view()->exists('auth.login')) {
            return view('auth.login');
        }
        if (view()->exists('login')) {
            return view('login');
        }

        // Si no se encuentra ningún archivo, mostramos un aviso amigable y personalizado
        return response('
            <div style="background:#0b0b0b; color:#fff; font-family:\'Segoe UI\', sans-serif; padding:40px; height:100vh; display:flex; align-items:center; justify-content:center; margin:0;">
                <div style="max-width:600px; border: 2px solid #c80d55; padding: 40px; border-radius: 12px; background: #121212; box-shadow: 0 10px 30px rgba(200, 13, 85, 0.15);">
                    <h2 style="color:#c80d55; margin-top:0; font-family:sans-serif; letter-spacing:1px;">⚠️ ¡FALTA LA VISTA DE LOGIN!</h2>
                    <p style="color:#ccc; font-size:1.1rem; line-height:1.6;">Laravel no encuentra el archivo visual para iniciar sesión.</p>
                    <p style="color:#aaa; font-size:0.95rem;">Asegurate de tener creado el archivo en tu VS Code exactamente en alguna de estas ubicaciones:</p>
                    <ul style="line-height:1.8; color:#00ffcc; font-family:monospace; font-size:1rem; list-style-type: none; padding-left: 0;">
                        <li>📂 resources/views/layouts/auth/login.blade.php <span style="color:#888; font-size:0.8rem;">(Tu ubicación actual)</span></li>
                        <li>📂 resources/views/auth/login.blade.php <span style="color:#888; font-size:0.8rem;">(Recomendado estándar)</span></li>
                        <li>📂 resources/views/login.blade.php</li>
                    </ul>
                    <hr style="border: 0; border-top: 1px solid #333; margin: 25px 0;">
                    <p style="margin-bottom:0; color:#666; font-size:0.85rem;">Crea el archivo, pegale tu código de login, guardalo y recargá esta página.</p>
                </div>
            </div>
        ');
    })->name('login');

    // 4. Procesar el Inicio de Sesión
    Route::post('login', function (Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Intentamos iniciar sesión con las credenciales
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Redirige a donde quería ir o al inicio
            return redirect()->intended('/');
        }

        // Si falla, lo mandamos de vuelta con el error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    });
});

Route::middleware('auth')->group(function () {

    // 5. Cierre de Sesión (Logout)
    Route::post('logout', function (Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    })->name('logout');
});
