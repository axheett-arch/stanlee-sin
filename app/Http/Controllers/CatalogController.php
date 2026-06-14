<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Importación del modelo de la cátedra [cite: 48, 50]

class CatalogController extends Controller
{
    public function index()
    {
        // 1. Traemos de DBeaver solo los suministros con alta lógica (activos) [cite: 67, 85, 178]
        $todosLosProductos = Producto::where('activo', true)->get();

        // 2. Extraemos el primer producto de la base de datos para el Layout Horizontal Ancho
        $destacado = $todosLosProductos->first();

        // 3. Dejamos el resto para la Grilla de 3 columnas
        // skip(1) saltea el primero para que no aparezca duplicado abajo
        $productos = $todosLosProductos->skip(1);

        // 4. Retornamos la vista inyectando las variables dinámicas exactamente con el mismo nombre
        return view('catalogo', compact('destacado', 'productos'));
    }
}
