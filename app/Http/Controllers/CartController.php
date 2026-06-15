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

    // 2. Agregar Producto al Carrito (Con Validación de Unidades)
    public function add(Request $request, $id)
    {
        // 1. Buscamos el suministro en DBeaver
        $producto = Producto::findOrFail($id);

        // 2. 🛡️ CONTROL DE INVENTARIO CRÍTICO: ¿Hay unidades disponibles?
        if ($producto->stock <= 0) {
            return redirect()->back()->with('error', "OPERACIÓN ABORTADA: No quedan unidades disponibles de {$producto->nombre} en el arsenal.");
        }

        // 3. Levantamos el carrito actual de la sesión
        $cart = session()->get('cart', []);

        // 4. LÓGICA DE INSERCIÓN/INCREMENTO EN SESIÓN
        if (isset($cart[$id])) {
            // Control extra: que no intente agregar más de lo que hay físico
            if ($cart[$id]['cantidad'] + 1 > $producto->stock) {
                return redirect()->back()->with('error', "OPERACIÓN LIMITE: No podés equipar más unidades de las disponibles en stock ({$producto->stock} unidades).");
            }
            $cart[$id]['cantidad']++;
        } else {
            // Si es la primera unidad, armamos la estructura del item
            $cart[$id] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $producto->url_imagen ?? 'izanagi.png'
            ];
        }

        // Guardamos los cambios en la sesión de Laravel
        session()->put('cart', $cart);

        return redirect()->back()->with('success', "{$producto->nombre} fue acoplado a tu carrito de compras.");
    }

    // 3. Confirmar Compra (Guarda en BD, descuenta stock y prepara el Ticket)
    public function confirm()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'El carrito está vacío.');
        }

        // 🛡️ CANDADO DE SEGURIDAD FINAL: Verificar stock de todo el carrito antes de procesar el dinero
        foreach ($cart as $productoId => $details) {
            $prodDB = Producto::find($productoId);
            if (!$prodDB || $prodDB->stock < $details['cantidad']) {
                return redirect()->route('cart.index')->with('error', "STOCK INSUFICIENTES: El item '{$details['nombre']}' ya no cuenta con unidades bastantes en el depósito. Por favor, ajuste su orden.");
            }
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

        // C. Iteramos para guardar el detalle fila por fila Y DESCONTAR STOCK REAL
        foreach($cart as $productoId => $details) {
            // Guardamos el renglón de la factura
            DetalleVenta::query()->create([
                'venta_id' => $nuevaVenta->id,
                'producto_id' => $productoId,
                'cantidad' => $details['cantidad'],
                'precio_unitario' => $details['precio']
            ]);

            // 📉 DESCUENTO TÁCTICO: Restamos las unidades compradas del stock físico en DBeaver
            $prodDB = Producto::find($productoId);
            $prodDB->stock = $prodDB->stock - $details['cantidad'];
            $prodDB->save();
        }

        // FLASH METADATA: Guardamos temporalmente los datos del ticket para la vista de éxito
        session()->flash('ticket_id', $nuevaVenta->id);
        session()->flash('ticket_productos', $cart);
        session()->flash('ticket_total', $total);

        // D. Vaciar el carrito de la sesión
        session()->forget('cart');

        // Redirigimos a la pantalla de confirmación táctica
        return redirect()->route('cart.exitosa');
    }

    // 3.5 Vista de Operación Exitosa (Ticket de Despacho)
    public function exitosa()
    {
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

    // ==========================================
    // 👤 MÓDULO PERFIL DE USUARIO (NUEVO)
    // ==========================================
    // ==========================================
    // 👤 MÓDULO PERFIL DE USUARIO (POTENCIADO)
    // ==========================================
    public function perfil()
    {
        $user = Auth::user();

        // 1. 🚨 RANGOS DE LEALTAD: Calculamos la sumatoria total invertida por este usuario
        $totalInvertido = \App\Models\Venta::where('user_id', $user->id)->sum('total');

        // Determinamos la etiqueta del rango según el gasto acumulado
        if ($totalInvertido >= 300000) {
            $rangoLealtad = 'CLIENTE ELITE // SINDATO';
            $rangoColor = '#c80d55'; // Magenta neón
        } elseif ($totalInvertido >= 100000) {
            $rangoLealtad = 'OPERADOR STREET';
            $rangoColor = '#0dcaf0'; // Info cian
        } else {
            $rangoLealtad = 'RECLUTA BASE';
            $rangoColor = '#6c757d'; // Gris secundario
        }

        // 2. Buscamos las últimas 5 órdenes (Ventas)
        $ultimasCompras = \App\Models\Venta::with('detalles.producto')
                                ->where('user_id', $user->id)
                                ->orderBy('created_at', 'desc')
                                ->take(5)
                                ->get();

        // 3. 📨 BANDEJA DE MENSAJES: Traemos las consultas que este usuario mandó por /contacto
        // Vinculamos usando el email del usuario logueado
        $misConsultas = \App\Models\Contacto::where('email', $user->email)
                                            ->orderBy('created_at', 'desc')
                                            ->get();

        return view('perfil', compact('user', 'ultimasCompras', 'misConsultas', 'rangoLealtad', 'rangoColor', 'totalInvertido'));
    }

    // 🛠️ ACCIÓN: Procesar la actualización de datos y contraseña
    // 🛠️ ACCIÓN: Procesar la actualización de datos, contraseña y AVATAR
    public function perfilUpdate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la foto (Max 2MB)
        ]);

        // Actualizamos el alias básico
        $user->name = $request->name;

        // Si el operador digitó una nueva clave, la encriptamos
        if (!empty($request->password)) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        // 📸 PROCESAMIENTO DEL AVATAR
        if ($request->hasFile('avatar')) {
            // Si el usuario ya tenía un avatar personalizado que no sea el icono por defecto, lo borramos para no acumular basura
            if ($user->avatar && $user->avatar !== 'default-avatar.png' && \Illuminate\Support\Facades\Storage::disk('public')->exists('avatars/' . $user->avatar)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete('avatars/' . $user->avatar);
            }

            // Guardamos el nuevo archivo en storage/app/public/avatars
            $file = $request->file('avatar');
            $filename = time() . '_' . $user->id . '.' . $file->getClientOriginalExtension();
            $file->storeAs('avatars', $filename, 'public');

            // Guardamos el nombre del archivo en la base de datos (necesitás tener la columna 'avatar' en tu tabla 'users')
            $user->avatar = $filename;
        }

        $user->save();

        return redirect()->route('perfil.index')->with('success', 'Credenciales y registro biométrico actualizados correctamente.');
    }
}
