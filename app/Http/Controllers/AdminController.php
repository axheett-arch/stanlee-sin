<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use App\Models\User;
use App\Models\Contacto; // 👈 Importamos tu modelo real para la bandeja de entrada
use App\Models\Pedido;   // 👈 Importamos el modelo Pedido para la gestión de órdenes

class AdminController extends Controller
{
    // 📊 Centro neurálgico del Dashboard
    // 📊 Centro neurálgico del Dashboard
    public function dashboard()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('catalogo')->with('error', 'ACCESO DENEGADO.');
        }

        $totalSuministros = Producto::where('activo', true)->count();
        $totalUsuarios = User::count();
        $totalStockFisico = Producto::where('activo', true)->sum('stock');

        // 🛠️ CORREGIDO: Contamos ÚNICAMENTE las órdenes que ya fueron despachadas (Historial)
        $totalOrdenes = Pedido::where('estado', 'despachado')->count();

        // 🚨 COLA DE ESPERA: Contamos las órdenes que siguen en estado pendiente
        $pedidosPendientesCount = Pedido::where('estado', 'pendiente')->count();

        $totalFacturado = Pedido::sum('total');

        return view('admin.dashboard', compact(
            'totalSuministros',
            'totalUsuarios',
            'totalStockFisico',
            'totalOrdenes',
            'totalFacturado',
            'pedidosPendientesCount'
        ));
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

        $contactos = Contacto::orderBy('leido', 'asc')
                             ->orderBy('created_at', 'desc')
                             ->get();

        return view('admin.consultass', compact('contactos'));
    }

    // 👁️ Marcar mensaje como Atendido/Leído
    public function contactoLeer($id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) { return redirect()->back(); }

        $contacto = Contacto::findOrFail($id);
        $contacto->leido = true;
        $contacto->save();

        return redirect()->back()->with('success', 'Mensaje archivado en el registro de leídos.');
    }

    // 🗑️ Eliminar mensaje de la base de datos
    public function contactoDestroy($id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) { return redirect()->back(); }

        $contacto = Contacto::findOrFail($id);
        $contacto->delete();

        return redirect()->back()->with('success', 'Mensaje eliminado del registro central.');
    }

    // ==========================================
    // 📦 GESTIÓN DE PEDIDOS PENDIENTES
    // ==========================================

    public function pedidosIndex()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('catalogo')->with('error', 'ACCESO DENEGADO.');
        }

        // ⏳ Órdenes que hay que despachar sí o sí
        $pedidosPendientes = Pedido::with(['user', 'detalles.producto'])
                                    ->where('estado', 'pendiente')
                                    ->orderBy('created_at', 'desc')
                                    ->get();

        // ✅ Historial de lo que la crew ya despachó
        $pedidosDespachados = Pedido::with(['user', 'detalles.producto'])
                                        ->where('estado', 'despachado')
                                        ->orderBy('updated_at', 'desc')
                                        ->get();

        return view('admin.pedidos', compact('pedidosPendientes', 'pedidosDespachados'));
    }

    public function pedidoDespachar(int $id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) { return redirect()->back(); }

        $pedido = Pedido::findOrFail($id);
        $pedido->estado = 'despachado';
        $pedido->save();

        return redirect()->back()->with('success', "¡Orden #{$id} marcada como despachada!");
    }

    // ==========================================
    // 👥 GESTIÓN DE USUARIOS
    // ==========================================

    public function usuariosIndex()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('catalogo')->with('error', 'ACCESO DENEGADO.');
        }

        $usuarios = User::orderBy('created_at', 'desc')->get();

        return view('admin.usuarios', compact('usuarios'));
    }

    public function usuarioToggleRole($id)
    {
        if (!Auth::check() || !Auth::user()->is_admin) { return redirect()->back(); }

        // Medida táctica de seguridad: No podés sacarte el admin a vos mismo
        if ($id == Auth::id()) {
            return redirect()->back()->with('error', 'No podés revocar tus propios permisos.');
        }

        $usuario = User::findOrFail($id);
        $usuario->is_admin = !$usuario->is_admin;
        $usuario->save();

        return redirect()->back()->with('success', "Rango del usuario '{$usuario->name}' actualizado.");
    }

    // Función auxiliar privada para calcular el texto neón del stock al vuelo
    private function getHtmlStock($stock) {
        if($stock == 0) return '<span class="text-danger fw-bold">// CRÍTICO (0 U)</span>';
        if($stock <= 5) return '<span class="text-warning fw-bold">// STOCK BAJO (' . $stock . ' U)</span>';
        return '<span class="text-success">' . $stock . ' U</span>';
    }
}
