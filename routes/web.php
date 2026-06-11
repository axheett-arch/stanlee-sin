<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CatalogController; // 👈 Clave para que funcione el catálogo
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Web del Proyecto StanLee Sin
|--------------------------------------------------------------------------
*/

// Inicio de la web
Route::get('/', function () {
    return view('layouts.principal');
});

// Sección de Contacto
Route::get('/contacto', function () {
    return view('contacto');
});
Route::post('/contacto', [ContactoController::class, 'procesar'])->name('contacto.store');

// Páginas de Información Estáticas
Route::view('/nosotros', 'nosotros');
Route::view('/terminos', 'terminos')->name('terminos');
Route::view('/consultas', 'consultas')->name('consultas');
Route::view('/comercializacion', 'comercializacion');

// En desarrollo y éxito de contacto
Route::get('/en-desarrollo', function () {
    return view('coming-soon');
})->name('en.desarrollo');

Route::get('/mensaje-enviado', function () {
    return view('mensaje-enviado');
})->name('contacto.enviado');

/*
|--------------------------------------------------------------------------
| Sección Catálogo (¡Conectado al Controlador!)
|--------------------------------------------------------------------------
*/
// Ahora sí, llama directo a la función index() de tu CatalogController
Route::get('/catalogo', [CatalogController::class, 'index'])->name('catalogo');

/*
|--------------------------------------------------------------------------
| RUTAS DE AUTENTICACIÓN (BREEZE)
|--------------------------------------------------------------------------
*/
// ⚠️ ¡ESTA LÍNEA ES LA QUE FALTA! Activa las rutas de login y register para que no explote la plantilla
require __DIR__ . '/auth.php';
