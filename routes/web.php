<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('layouts.principal');
});


Route::get('/contacto', function () {
    return view('contacto');
});
Route::post('/contacto', [ContactoController::class, 'procesar']);


Route::view('/nosotros', 'nosotros');
Route::view('/terminos', 'terminos')->name('terminos');
Route::view('/consultas', 'consultas')->name('consultas');
Route::view('/comercializacion', 'comercializacion');


Route::get('/en-desarrollo', function () {
    return view('coming-soon');
})->name('en.desarrollo');

Route::get('/mensaje-enviado', function () {
    return view('mensaje-enviado');
})->name('contacto.enviado');


Route::get('/catalogo', function () {
    $destacado = [
        'nombre' => 'SET MAESTRÍA TOTAL',
        'subtitulo' => 'ULTIMATE BUNDLE // SN-MAX',
        'precio' => '$145.000',
        'descripcion' => 'El arsenal definitivo para el cebador de élite. Incluye Termo Classic 1L, Mate System y Bombilla de alta precisión.',
        'imagen' => 'set-maestria.png',
        'glow' => true
    ];

    $productos = [
        [
            'nombre' => 'IZANAGI WHITE',
            'precio' => '$70.000',
            'descripcion' => 'Pureza y resistencia extrema. Visión clara en la tormenta.',
            'imagen' => 'izanagi.png',
            'glow' => false,
            'style' => ''
        ],
        [
            'nombre' => 'MONJE CIEGO',
            'precio' => '$68.000',
            'descripcion' => 'Resistencia legendaria que no necesita presentación. El pilar de la crew.',
            'imagen' => 'monjeciego.png',
            'glow' => false,
            'style' => ''
        ],
        [
            'nombre' => 'TEMPEST DARK',
            'precio' => '$85.000',
            'descripcion' => 'Forjado en las sombras, diseñado para brillar. El item definitivo del setup.',
            'imagen' => 'tempest.png',
            'glow' => false,
            'style' => ''
        ]
    ];

    return view('catalogo', compact('destacado', 'productos'));
})->name('catalogo');


require __DIR__.'/auth.php';
