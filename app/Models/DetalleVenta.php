<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_ventas';

    protected $fillable = ['venta_id', 'producto_id', 'cantidad', 'precio_unitario'];

    // Asegurate de que este método exista para que funcione el ".producto"
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
