<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function mostrarFormulario()
    {
        return view('pagar');
    }

    public function procesar(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'],
            'dui' => ['required', 'regex:/^\d{8}-\d{1}$/'],
            'tarjeta' => ['required', 'regex:/^\d{4} \d{4} \d{4} \d{4}$/'],
            'fecha_vencimiento' => ['required', 'regex:/^(0[1-9]|1[0-2])\/\d{2}$/'], // MM/YY
            'correo' => ['required', 'email'],
        ], [
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',
            'dui.regex' => 'El DUI debe tener el formato 12345678-9.',
            'tarjeta.regex' => 'El número de tarjeta debe tener el formato 1234-5678-9012-3456.',
            'fecha_vencimiento.regex' => 'La fecha debe estar en formato MM/YY y debe ser posterior a la fecha actual.',
            'correo.email' => 'Debe ser un correo electrónico válido.',
        ]);

        // Obtener carrito
        $carrito = session('carrito', []);
        $total = array_sum(array_column($carrito, 'subtotal'));

        // Mostrar vista de factura
        return view('factura', [
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'dui' => $request->dui,
            'carrito' => $carrito,
            'total' => $total,
            'fecha' => now()->format('d/m/Y H:i'),
        ]);
    }
}
