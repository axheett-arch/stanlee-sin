<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CatalogController; // Agrupamos los uses arriba para que quede pro
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
Route::view('/login', 'login');
Route::view('/registro', 'registro');

// LA ÚNICA RUTA DEL CATÁLOGO DEBE SER ESTA:
Route::get('/catalogo', [CatalogController::class, 'index'])->name('catalogo');

Route::get('/en-desarrollo', function () {
    return view('coming-soon');
})->name('en.desarrollo');

Route::get('/mensaje-enviado', function () {
    return view('mensaje-enviado');
})->name('contacto.enviado');

Route::get('/catalogo', function () {
    // Producto destacado
    $destacado = [
        'nombre' => 'SET MAESTRÍA TOTAL',
        'subtitulo' => 'ULTIMATE BUNDLE // SN-MAX',
        'precio' => '$145.000',
        'descripcion' => 'El arsenal definitivo para el cebador de élite. Incluye Termo Classic 1L, Mate System y Bombilla de alta precisión.',
        'imagen' => 'set-maestria.png',
        'glow' => true
    ];

    // Resto de los productos
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
        ],
        [
            'nombre' => 'STORM DRINK',
            'precio' => '$68.000',
            'descripcion' => 'Unidad térmica de flujo rápido. Incluye bombilla de precisión para el tereré más frío.',
            'imagen' => 'terere-storm.png',
            'glow' => true,
            'style' => 'bg-dark-gradient'
        ],
        [
            'nombre' => 'STRIKER CUP',
            'precio' => '$70.000',
            'descripcion' => 'Brindis final. Destapador táctico incluido.',
            'imagen' => 'vasostriker.png',
            'glow' => false,
            'style' => ''
        ],
        [
            'nombre' => 'GROWLER BÚNKER',
            'precio' => '$68.000',
            'descripcion' => 'El tanque que tu inventario necesita. Resistencia de grado militar.',
            'imagen' => 'bunker.png',
            'glow' => false,
            'style' => ''
        ],
        [
            'nombre' => 'GHOST WHITE',
            'precio' => '$62.000',
            'descripcion' => 'Máxima retención térmica. Domina cada partida con energía inagotable.',
            'imagen' => 'ghost-white.png',
            'glow' => false,
            'style' => ''
        ],
        [
            'nombre' => 'FIRE DRAGON',
            'precio' => '$62.000',
            'descripcion' => 'Poder de fuego. Temperatura extrema asegurada.',
            'imagen' => 'monjeciego.png',
            'glow' => true,
            'style' => 'bg-dark-gradient',
            'filter' => 'filter: hue-rotate(40deg) saturate(1.5);'
        ],
        [
            'nombre' => 'GREEN BUSH',
            'precio' => '$135.000',
            'descripcion' => 'Con el sigilo de la jungla. El verde de la resistencia.',
            'imagen' => 'bush.png',
            'glow' => false,
            'style' => ''
        ]
    ];

    return view('catalogo', compact('destacado', 'productos'));
})->name('catalogo');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');
