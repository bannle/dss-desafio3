<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Productos;

class CarritoController extends Controller
{
    public function agregar(Request $request)
    {
        $producto = Productos::findOrFail($request->id);
        $cantidad = (int)$request->stock;

        if ($cantidad < 1) {
            return redirect()->back()->with('error', '📦 Debes agregar al menos una unidad del producto.');
        }

        if ($cantidad > $producto->stock) {
            return redirect()->back()->with('error', '🚫 Lo sentimos, no hay suficiente stock disponible.');
        }

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$producto->id])) {
            $nuevaCantidad = $carrito[$producto->id]['cantidad'] + $cantidad;

            if ($nuevaCantidad > $producto->stock) {
                return redirect()->back()->with('error', '⚠️ Has alcanzado el máximo disponible para este producto.');
            }

            $carrito[$producto->id]['cantidad'] = $nuevaCantidad;
            $carrito[$producto->id]['subtotal'] = $producto->precio * $nuevaCantidad;
        } else {
            $carrito[$producto->id] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => $cantidad,
                'imagen_url' => $producto->imagen_url,
                'subtotal' => $producto->precio * $cantidad
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->back()->with('success', '🛍 Producto agregado a tu carrito.');
    }

    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('success', '🗑 Producto eliminado del carrito.');
    }

    public function vaciar()
    {
        session()->forget('carrito');
        return redirect()->back()->with('success', '🧹 Tu carrito ha sido vaciado.');
    }
}
