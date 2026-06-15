<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;

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
| 🔒 Sección Carrito de Compras e Historial (Protegido por Autenticación)
|--------------------------------------------------------------------------
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

    // Ruta para ver el historial de compras del usuario
    Route::get('/mis-compras', [CartController::class, 'historial'])->name('compras.historial');

    // Ruta para ver el detalle / factura de una compra específica
    Route::get('/mis-compras/factura/{id}', [CartController::class, 'factura'])->name('compras.factura');


    // =========================================================================
    // 🛡️ CORE ADMINISTRADOR (Rutas de Control)
    // =========================================================================

    // Vista General del Panel de Control (Monitoreo de Stock)
    Route::get('/admin/productos', [AdminController::class, 'index'])->name('admin.index');

    // Acción de Baja Lógica / Reactivación de Suministros
    Route::post('/admin/productos/baja/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // Acción para asignar el Suministro Principal (Destacado)
    Route::post('/admin/productos/destacar/{id}', [AdminController::class, 'destacar'])->name('admin.destacar');

    // --- Alta de Productos (Formulario y Guardado) ---
    Route::get('/admin/productos/crear', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/productos/guardar', [AdminController::class, 'store'])->name('admin.store');

    // --- Edición de Productos (Formulario y Actualización) ---
    Route::get('/admin/productos/editar/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/productos/actualizar/{id}', [AdminController::class, 'update'])->name('admin.update');

    // --- Ajuste rápido de Stock vía AJAX ---
    Route::post('/admin/productos/{id}/stock-subir', [AdminController::class, 'stockSubir'])->name('admin.stock.subir');
    Route::post('/admin/productos/{id}/stock-bajar', [AdminController::class, 'stockBajar'])->name('admin.stock.bajar');

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // --- Gestión de Contactos (Bandeja de Entrada Admin) ---
    Route::get('/admin/contactos', [AdminController::class, 'contactosIndex'])->name('admin.contactos.index');
    Route::post('/admin/contactos/{id}/leer', [AdminController::class, 'contactoLeer'])->name('admin.contactos.leer');
    Route::delete('/admin/contactos/{id}', [AdminController::class, 'contactoDestroy'])->name('admin.contactos.destroy');

    // Ruta para procesar la respuesta interna
    Route::post('/admin/contactos/{id}/responder', [AdminController::class, 'contactoResponder'])->name('admin.contactos.responder');

});

/*
|--------------------------------------------------------------------------
| RUTAS DE AUTENTICACIÓN (BREEZE)
|--------------------------------------------------------------------------
*/
// Activa las rutas de login y register nativas de Breeze
require __DIR__ . '/auth.php';
