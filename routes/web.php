<?php

use App\Http\Controllers\ContactoController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sobre-mi', function () {
    return view('sobre-mi');
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
