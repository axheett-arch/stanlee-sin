<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;

class AdminController extends Controller
{
    // 1. Listado de todos los productos para el Administrador (Con Buscador Avanzado)
   public function index(Request $request)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('catalogo')->with('error', 'ACCESO DENEGADO.');
        }

        $buscar = $request->get('buscar');

        if (!empty($buscar)) {
            $productos = Producto::where('nombre', 'LIKE', '%' . $buscar . '%')
                                 ->orderBy('id', 'desc')
                                 ->get();
        } else {
            $productos = Producto::orderBy('id', 'desc')->get();
        }

        // 👈 CLAVE AJAX: Si la petición viene desde JavaScript, renderizamos solo las filas
        if ($request->ajax()) {
            return view('admin.partials.productos-filas', compact('productos'))->render();
        }

        return view('admin.productos', compact('productos', 'buscar'));
    }

    // 2. BAJA LÓGICA: Alterna el estado del suministro
    public function destroy($id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('catalogo')->with('error', 'ACCESO DENEGADO.');
        }

        $producto = Producto::findOrFail($id);

        if ($producto->activo) {
            $producto->activo = false;
            $mensaje = 'Suministro desactivado del catálogo.';
        } else {
            $producto->activo = true;
            $mensaje = 'Suministro reactivado en el catálogo.';
        }

        $producto->save();

        return redirect()->back()->with('success', $mensaje);
    }

    // 3. Mostrar el formulario de creación
    public function create()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('catalogo')->with('error', 'ACCESO DENEGADO.');
        }

        return view('admin.crear-producto');
    }

    // 4. Procesar el formulario e insertar el suministro en DBeaver
    public function store(Request $request)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('catalogo')->with('error', 'ACCESO DENEGADO.');
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $nombreImagen = 'izanagi.png';
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('img'), $nombreImagen);
        }

        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'url_imagen' => $nombreImagen,
            'activo' => true
        ]);

        return redirect()->route('admin.index')->with('success', 'Suministro incorporado al arsenal.');
    }

    // 5. Asignar el producto principal de la tienda (Destacado)
    public function destacar($id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('catalogo')->with('error', 'ACCESO DENEGADO.');
        }

        Producto::query()->update(['destacado' => false]);

        $producto = Producto::findOrFail($id);
        $producto->destacado = true;
        $producto->save();

        return redirect()->back()->with('success', "{$producto->nombre} ahora es el Suministro Principal.");
    }

    // 6. 👈 EL QUE FALTABA: Mostrar el formulario de edición con los datos cargados
    public function edit($id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('catalogo')->with('error', 'ACCESO DENEGADO.');
        }

        $producto = Producto::findOrFail($id);
        return view('admin.editar-producto', compact('producto'));
    }

    // 7. Procesar la actualización en DBeaver
    public function update(Request $request, $id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('catalogo')->with('error', 'ACCESO DENEGADO.');
        }

        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('img'), $nombreImagen);
            $producto->url_imagen = $nombreImagen;
        }

        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->save();

        return redirect()->route('admin.index')->with('success', 'Suministro actualizado correctamente.');
    }
}
