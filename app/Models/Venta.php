<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';

    protected $fillable = ['user_id', 'total'];

    // 👈 ESTA ES LA FUNCIÓN QUE FALTA O ESTÁ MAL ESCRITA
    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'venta_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
