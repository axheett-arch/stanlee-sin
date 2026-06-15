<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Campos que permitimos llenar desde formularios o arrays de una sola vez
   protected $fillable = ['nombre', 'precio', 'descripcion', 'url_imagen', 'activo', 'destacado', 'stock'];

    // Conversión automática de tipos para evitar errores de formato en tu código
    protected $casts = [
        'precio' => 'decimal:2',
        'stock' => 'integer',
        'activo' => 'boolean',
    ];
}
