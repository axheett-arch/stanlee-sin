<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Fachada para evitar falsos positivos de id()
use App\Models\Producto;      // Para buscar datos reales de los suministros
use App\Models\Venta;         // Cabecera de la operación
use App\Models\DetalleVenta;  // Renglones de la operación

class CartController extends Controller
{
    // 1. Vista del Carrito (Inventario)
    public function index()
    {
        // Traemos el carrito de la sesión, si no existe pasamos un array vacío
        $cart = session()->get('cart', []);

        // Calculamos el total acumulado de la compra
        $total = 0;
        foreach($cart as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        return view('carrito', compact('cart', 'total'));
    }

    // 2. Agregar Producto al Carrito
    public function add($id)
    {
        $producto = Producto::findOrFail($id); // Buscamos el ítem en DBeaver [cite: 103, 154]
        $cart = session()->get('cart', []);

        // Si el producto ya está en el carrito, le sumamos 1 a la cantidad
        if(isset($cart[$id])) {
            $cart[$id]['cantidad']++;
        } else {
            // Si es nuevo, lo agregamos con sus datos base de la BD
            $cart[$id] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $producto->url_imagen ?? 'izanagi.png'
            ];
        }

        session()->put('cart', $cart); // Guardamos el estado en la sesión
        return redirect()->back()->with('success', '¡Suministro equipado al carrito!');
    }

   // 3. Confirmar Compra (Guarda en BD y prepara el Ticket)
    public function confirm()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'El carrito está vacío.');
        }

        // A. Calculamos el total general
        $total = 0;
        foreach($cart as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        // B. Insertamos la cabecera en la tabla 'ventas'
        $nuevaVenta = Venta::query()->create([
            'user_id' => Auth::id(),
            'total' => $total
        ]);

        // C. Iteramos para guardar el detalle fila por fila
        foreach($cart as $productoId => $details) {
            DetalleVenta::query()->create([
                'venta_id' => $nuevaVenta->id,
                'producto_id' => $productoId,
                'cantidad' => $details['cantidad'],
                'precio_unitario' => $details['precio']
            ]);
        }

        // FLASH METADATA: Guardamos temporalmente los datos del ticket para la vista de éxito
        // Esto dura solo una carga de página (un F5 y desaparece)
        session()->flash('ticket_id', $nuevaVenta->id);
        session()->flash('ticket_productos', $cart);
        session()->flash('ticket_total', $total);

        // D. Cumplimos la consigna: Vaciar el carrito de la sesión
        session()->forget('cart');

        // Redirigimos a la pantalla de confirmación táctica
        return redirect()->route('cart.exitosa');
    }

    // 3.5 Vista de Operación Exitosa (Ticket de Despacho)
    public function exitosa()
    {
        // Comentá estas líneas con doble barra para probar:
        // if (!session()->has('ticket_id')) {
        //     return redirect()->route('catalogo');
        // }

        return view('operacion-exitosa');
    }

    // 4. Eliminar Producto por completo del Carrito
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]); // Borramos el producto del array usando su ID
            session()->put('cart', $cart); // Actualizamos la sesión
        }

        return redirect()->back()->with('success', 'Suministro removido del inventario.');
    }

    // 5. Historial de compras con desglose de suministros
    public function historial()
    {
        // Trae las ventas del usuario, cargando en cadena sus detalles y los productos de esos detalles
        $misCompras = Venta::with('detalles.producto')
                            ->where('user_id', Auth::id())
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('mis-compras', compact('misCompras'));
    }

    // 6. Ver Factura de una compra específica (Segura)
    public function factura($id)
    {
        // Buscamos la venta con sus detalles y productos, asegurando que sea del usuario actual
        $venta = Venta::with('detalles.producto')
                      ->where('user_id', Auth::id())
                      ->findOrFail($id);

        return view('factura', compact('venta'));
    }
}
