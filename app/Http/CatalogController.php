<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        // Producto destacado (Layout Horizontal Ancho)
        $destacado = [
            'nombre' => 'SET MAESTRÍA TOTAL',
            'subtitulo' => 'ULTIMATE BUNDLE // SN-MAX',
            'precio' => '$145.000',
            'descripcion' => 'El arsenal definitivo para el cebador de élite. Incluye Termo Classic 1L, Mate System y Bombilla de alta precisión.',
            'imagen' => 'set-maestria.png',
            'glow' => true
        ];

        // Resto de los productos (Layout de Grilla de 3 columnas)
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
    }
}
