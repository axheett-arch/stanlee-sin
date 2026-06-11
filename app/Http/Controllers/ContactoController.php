<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Procesa y guarda la información enviada desde el formulario de contacto.
     */
    public function procesar(Request $request)
    {
        // 1. Validamos rigurosamente los 4 campos de tu formulario
        $request->validate([
            'nombre'  => ['required', 'string', 'max:150'],
            'email'   => ['required', 'string', 'email', 'max:150'],
            'motivo'  => ['required', 'string', 'max:150'], // Campo "Motivo de la Misión"
            'mensaje' => ['required', 'string', 'min:5'],
        ]);

        // 2. Guardamos los datos de una sola vez en MariaDB usando el Modelo
        Contacto::create([
            'nombre'  => $request->nombre,
            'email'   => $request->email,
            'motivo'  => $request->motivo,
            'mensaje' => $request->mensaje,
        ]);

        // 3. Redirigimos al usuario a la vista de éxito con un mensaje flama
        return redirect()->route('contacto.enviado');
    }
}
