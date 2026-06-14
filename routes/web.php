<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CartController; // 👈 NUEVO: Importamos el controlador del carrito
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
Route::get('/catalogo', [CatalogController::class, 'index'])->name('catalogo');

/*
|--------------------------------------------------------------------------
| Sección Carrito de Compras (Protegido por Autenticación)
|--------------------------------------------------------------------------
| Usamos el middleware 'auth' para cumplir la consigna de que solo los
| usuarios clientes registrados puedan gestionar el inventario y comprar.
*/
Route::middleware(['auth'])->group(function () {
    // Ver el carrito
    Route::get('/carrito', [CartController::class, 'index'])->name('cart.index');

    // Agregar un producto (el botón "EQUIPAR" va a apuntar acá)
    Route::post('/carrito/agregar/{id}', [CartController::class, 'add'])->name('cart.add');

    // Confirmar la operación y vaciar el carrito
    Route::post('/carrito/confirmar', [CartController::class, 'confirm'])->name('cart.confirm');

    // Eliminar un producto por completo del carrito
    Route::post('/carrito/eliminar/{id}', [CartController::class, 'remove'])->name('cart.remove');

    // Ruta para ver el ticket de la última compra
    Route::get('/operacion-exitosa', [CartController::class, 'exitosa'])->name('cart.exitosa');

    // Ruta que procesa la compra
    Route::post('/carrito/confirmar', [CartController::class, 'confirm'])->name('cart.confirm');

    // Ruta que muestra la pantalla ciberpunk de éxito
    Route::get('/operacion-exitosa', [CartController::class, 'exitosa'])->name('cart.exitosa');

    // Ruta para ver el historial de compras del usuario
    Route::get('/mis-compras', [CartController::class, 'historial'])->name('compras.historial');

    // Ruta para ver el detalle / factura de una compra específica
    Route::get('/mis-compras/factura/{id}', [CartController::class, 'factura'])->name('compras.factura');
});

/*
|--------------------------------------------------------------------------
| RUTAS DE AUTENTICACIÓN (BREEZE)
|--------------------------------------------------------------------------
*/
// Activa las rutas de login y register para que no explote la plantilla
require __DIR__ . '/auth.php';
