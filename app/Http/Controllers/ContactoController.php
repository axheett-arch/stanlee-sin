<?php

namespace App\Http\Controllers; // <-- Barra invertida obligatoria acá

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // <-- Clave para que herede bien en Laravel 11
use App\Models\Contacto; // <-- Importación limpia del modelo

class ContactoController extends Controller
{

    public function store(Request $request)
    {
        // 1. Validamos los datos que vienen de la interfaz (Campos Obligatorios) [cite: 129]
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'motivo' => 'required|string|max:150',
            'mensaje' => 'required|string',
        ], [
            // Mensajes personalizados por si querés que salgan en español criollo
            'nombre.required' => 'El nombre o A.K.A es obligatorio, che.',
            'email.required' => 'Necesitamos un email para responderte.',
            'email.email' => 'El formato del correo no es válido.',
            'motivo.required' => 'Seleccioná o escribí el motivo de la misión.',
            'mensaje.required' => 'No podés enviar una consulta vacía.',
        ]);

        // 2. Si pasa la validación, guardamos en MariaDB de una [cite: 98]
        Contacto::create($request->all());

        // 3. Volvemos a la página anterior con un cartelito de éxito
        return redirect()->back()->with('status', '¡Mensaje enviado a la Crew con éxito!');
    }
}
