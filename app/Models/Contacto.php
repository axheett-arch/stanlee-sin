<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    // Campos que permitimos llenar desde el formulario de la página
    protected $fillable = [
        'nombre',
        'email',
        'motivo',
        'mensaje',
    ];
}
