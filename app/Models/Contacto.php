<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    // Campos que permitimos llenar desde el formulario y la gestión admin
    protected $fillable = [
        'nombre',
        'email',
        'motivo',
        'mensaje',
        'leido',
        'respuesta_admin',
    ];
}
