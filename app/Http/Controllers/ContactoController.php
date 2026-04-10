<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function procesar(Request $request)
{
    // Capturamos los datos que vienen del formulario [cite: 556, 557]
    $nombre = $request->input('nombre');
    $email = $request->input('email');

    // Se los pasamos a la vista 'exito' [cite: 561]
    return view('exito', [
        'nombre' => $nombre,
        'email' => $email
    ]);
}
}

