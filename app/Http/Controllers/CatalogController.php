<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Importación del modelo de la cátedra

class CatalogController extends Controller
{
    public function index()
    {
        // 1. Traemos de DBeaver solo los suministros con alta lógica (activos)
        $todosLosProductos = Producto::where('activo', true)->get();

        // 2. Control de emergencia: si la cátedra dio de baja TODO el stock, evitamos que rompa la vista
        if ($todosLosProductos->isEmpty()) {
            $destacado = null;
            $productos = collect(); // Enviamos una colección vacía para que no explote el foreach
            return view('catalogo', compact('destacado', 'productos'));
        }

        // 3. Buscamos el producto que el admin marcó manualmente con la estrella (destacado = 1)
        $destacado = $todosLosProductos->where('destacado', true)->first();

        // 4. PLAN B: Si el admin no marcó ninguno todavía (o está en 0), agarramos el primero activo por defecto
        if (!$destacado) {
            $destacado = $todosLosProductos->first();
        }

        // 5. El resto va a la Grilla de columnas inferior, excluyendo al que elegimos como destacado
        // Usamos values() para resetear los índices de la colección y evitar desajustes en el blade
        $productos = $todosLosProductos->where('id', '!=', $destacado->id)->values();

        // 6. Retornamos la vista inyectando las variables dinámicas
        return view('catalogo', compact('destacado', 'productos'));
    }
}
