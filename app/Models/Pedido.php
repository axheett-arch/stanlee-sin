<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany; // 👈 Sumamos esta importación

class Pedido extends Model
{
    use HasFactory;

    // Forzamos a que el modelo use la tabla 'ventas' de tu DBeaver
    protected $table = 'ventas';

    protected $fillable = [
        'user_id',
        'total',
        'estado',
    ];

    /**
     * Relación: Una venta/pedido pertenece a un Usuario
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación: Un pedido tiene muchos detalles de venta
     * Esto nos permite traer la lista de productos asociados
     */
    public function detalles(): HasMany
    {
        // Vincula el ID de esta venta con la columna 'venta_id' en la tabla 'detalle_ventas'
        return $this->hasMany(DetalleVenta::class, 'venta_id');
    }
}
