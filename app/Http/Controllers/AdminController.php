<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use App\Models\User;
use App\Models\Contacto; // 👈 Importamos tu modelo real para la bandeja de entrada

class AdminController extends Controller
{
    // 📊 Centro neurálgico del Dashboard
    public function dashboard()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('catalogo')->with('error', 'ACCESO DENEGADO.');
        }

        $totalSuministros = Producto::where('activo', true)->count();
        $totalUsuarios = User::count();
        $totalStockFisico = Producto::where('activo', true)->sum('stock');

        // Datos de simulación temporales para las órdenes y la recaudación
        $totalOrdenes = 12;
        $totalFacturado = 755400;

        return view('admin.dashboard', compact('totalSuministros', 'totalUsuarios', 'totalStockFisico', 'totalOrdenes', 'totalFacturado'));
    }

    // 1. Listado de todos los productos para el Administrador (Con Buscador por AJAX)
    public function index(Request $request)
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('catalogo')->with('error', 'ACCESO DENEGADO: Credenciales insuficientes.');
        }

        $buscar = $request->get('buscar');

        if (!empty($buscar)) {
            $productos = Producto::where('nombre', 'LIKE', '%' . $buscar . '%')
                                 ->orderBy('id', 'desc')
                                 ->get();
        } else {
            $productos = Producto::orderBy('id', 'desc')->get();
        }

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
            'stock' => 'required|integer|min:0',
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
            'stock' => $request->stock,
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

    // 6. Mostrar el formulario de edición con los datos cargados
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
            'stock' => 'required|integer|min:0',
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
        $producto->stock = $request->stock;
        $producto->descripcion = $request->descripcion;
        $producto->save();

        return redirect()->route('admin.index')->with('success', 'Suministro actualizado correctamente.');
    }

    // 📊 Incrementar stock (+1) vía AJAX
    public function stockSubir($id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) { return response()->json(['error' => 'No authorized'], 403); }

        $producto = Producto::findOrFail($id);
        $producto->stock = $producto->stock + 1;
        $producto->save();

        return response()->json([
            'nuevo_stock' => $producto->stock,
            'status_html' => $this->getHtmlStock($producto->stock)
        ]);
    }

    // 📊 Decrementar stock (-1) vía AJAX
    public function stockBajar($id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) { return response()->json(['error' => 'No authorized'], 403); }

        $producto = Producto::findOrFail($id);

        if ($producto->stock > 0) {
            $producto->stock = $producto->stock - 1;
            $producto->save();
        }

        return response()->json([
            'nuevo_stock' => $producto->stock,
            'status_html' => $this->getHtmlStock($producto->stock)
        ]);
    }

   // 📨 Listado de contactos recibidos (Bandeja Admin)
    public function contactosIndex()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('catalogo')->with('error', 'ACCESO DENEGADO.');
        }

        // Cargamos los registros desde tu modelo real 'Contacto'
        $contactos = Contacto::orderBy('leido', 'asc')
                             ->orderBy('created_at', 'desc')
                             ->get();

        // Apuntamos exactamente a 'admin.consultass'
        return view('admin.consultass', compact('contactos'));
    }

    // 👁️ NUEVO: Marcar mensaje como Atendido/Leído
    public function contactoLeer($id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) { return redirect()->back(); }

        $contacto = Contacto::findOrFail($id);
        $contacto->leido = true;
        $contacto->save();

        return redirect()->back()->with('success', 'Mensaje archivado en el registro de leídos.');
    }

    // 🗑️ NUEVO: Eliminar mensaje de la base de datos
    public function contactoDestroy($id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) { return redirect()->back(); }

        $contacto = Contacto::findOrFail($id);
        $contacto->delete();

        return redirect()->back()->with('success', 'Mensaje eliminado del registro central.');
    }

    // Función auxiliar privada para calcular el texto neón del stock al vuelo
    private function getHtmlStock($stock) {
        if($stock == 0) return '<span class="text-danger fw-bold">// CRÍTICO (0 U)</span>';
        if($stock <= 5) return '<span class="text-warning fw-bold">// STOCK BAJO (' . $stock . ' U)</span>';
        return '<span class="text-success">' . $stock . ' U</span>';
    }
}
