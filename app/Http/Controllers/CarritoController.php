<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class CarritoController extends Controller
{
    public function agregar(Request $request)
    {
        $producto = Productos::findOrFail($request->id);
        $stock = $request->stock;

        session()->push('carrito', [
            'id'=>$producto->id,
            'nombre'=>$producto->nombre,
            'precio'=>$producto->precio,
            'stock'=>$stock,
            'subtotal'=>$producto->precio * $stock
        ]);

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }
}
