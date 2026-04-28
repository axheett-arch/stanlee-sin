<?php

use App\Http\Controllers\ContactoController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/contacto', function () {
    return view('contacto');
});

Route::post('/contacto', [ContactoController::class, 'procesar']);

Route::get('/', function () {
    return view('layouts.principal');
});

Route::view('/nosotros', 'nosotros');

Route::view('/terminos', 'terminos')->name('terminos');

Route::view('/consultas', 'consultas')->name('consultas');

Route::view('/comercializacion', 'comercializacion');

Route::view('/login', 'login');
Route::view('/registro', 'registro');

Route::view('/catalogo', 'catalogo')->name('catalogo');

Route::get('/en-desarrollo', function () {
    return view('coming-soon');
})->name('en.desarrollo');

Route::get('/mensaje-enviado', function () {
    return view('mensaje-enviado');
})->name('contacto.enviado');
